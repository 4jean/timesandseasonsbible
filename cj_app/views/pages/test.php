<?php foreach ($books as $row2):
    $book = $this->cj_model->list_bks($row2['b']);
    foreach($book as $row3):
    ?>
<p><?=$row3['name'];?></p>
    <?php endforeach; ?>
<?php endforeach; ?>

<?php echo $this->cj_model->seven_meta_verse(1, 'description'); ?>