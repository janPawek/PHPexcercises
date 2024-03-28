<?php
    require_once "db_connect.php";
    require_once "./file_upload.php";

function my_footer(){
    echo"</main>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'></script>
        <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('searchInput').addEventListener('input', function() {
            var searchText = this.value.trim();
            if(searchText.length >= 2) {
                fetch('autocomplete.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'search=' + encodeURIComponent(searchText)
                })
                .then(response => response.text())
                .then(data => {
                    document.querySelector('.autocomplete-results').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            } else {
                document.querySelector('.autocomplete-results').innerHTML = '';
            }
        });
    
        document.addEventListener('click', function(event) {
            if(!event.target.closest('.autocomplete-item')) {
                document.querySelector('.autocomplete-results').innerHTML = '';
            }
        });
    
        document.querySelector('.autocomplete-results').addEventListener('click', function(event) {
            var selectedText = event.target.textContent;
            document.getElementById('searchInput').value = selectedText;
            this.innerHTML = '';
        });
    });
    </script>
    </body>
    </html>";
}
?>



