        <div>
            <?php echo '<h5 class="footer">' . 'Copyright ' . date("Y") . '</h5>'; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#birth-date").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-100: +0",
                dateFormat: "yy-mm-dd"


            });
        });
    </script>
    </body>

    </html>