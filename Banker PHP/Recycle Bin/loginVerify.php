<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $accType = $_POST['accType'];
    
    if($username == 'manager' && $password = 'manager123' && )
    {
        echo "<script>location.href = \"managerHome.php\"</script>";
    }
    else if($username == 'customer' && $password = 'customer123')
    {
        echo "<script>location.href = \"customerHome.php\"</script>";
    }
}
?>