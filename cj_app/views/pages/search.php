<?php
echo 'SEARCH BOOKS HERE';
if(isset($error) && $error != ''){
    echo $error;
}

?>
    <br>

<?php
if(!isset($error)):
foreach($books as $row): ?>
    <p><?php echo '<strong>'.$row['v'].'</strong>'.' '.$row['t']; ?> </p>
<?php endforeach; ?>

<?php endif; ?>
