<?php
function showSuccessToast($message, $redirectUrl = null, $delay = 2000)
{
    echo "<script>
        $(document).ready(function() {
            $.toast({
                heading: 'Success!',
                text: '" . addslashes($message) . "',
                position: 'top-right',
                loaderBg: '#5ba035',
                icon: 'success',
                hideAfter: 3000,
                stack: 1
            });

            " . ($redirectUrl ? "setTimeout(function() { window.location.href = '$redirectUrl'; }, $delay);" : "") . "
        });
    </script>";
}

function showErrorToast( $redirectUrl = null, $delay = 3000)
{
    echo "<script>
        $(document).ready(function() {
            $.toast({
                heading: 'Error!',
                text: 'Something went wrong. Please try again. ',
                position: 'top-right',
                loaderBg: '#c0392b',
                icon: 'error',
                hideAfter: 3000,
                stack: 1
            });

            " . ($redirectUrl ? "setTimeout(function() { window.location.href = '$redirectUrl'; }, $delay);" : "") . "
        });
    </script>";
}

function showInfoToast($message, $redirectUrl = null, $delay = 3000)
{
    echo "<script>
        $(document).ready(function() {
            $.toast({
                heading: 'Info',
                text: '" . addslashes($message) . "',
                position: 'top-right',
                loaderBg: '#f39c12',
                icon: 'info',
                hideAfter: 3000,
                stack: 1
            });

            " . ($redirectUrl ? "setTimeout(function() { window.location.href = '$redirectUrl'; }, $delay);" : "") . "
        });
    </script>";
}

function showWarningToast($message, $redirectUrl = null, $delay = 3000)
{
    echo "<script>
        $(document).ready(function() {
            $.toast({
                heading: 'Warning',
                text: '" . addslashes($message) . "',
                position: 'top-right',
                loaderBg: '#f39c12',
                icon: 'warning',
                hideAfter: 3000,
                stack: 1
            });

            " . ($redirectUrl ? "setTimeout(function() { window.location.href = '$redirectUrl'; }, $delay);" : "") . "
        });
    </script>";
}



?>
