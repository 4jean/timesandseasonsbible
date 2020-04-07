<?php foreach ($books as $row2):
    $book = $this->cj_model->list_bks($row2['b']);
    foreach($book as $row3):
        ?>
        <a class="btn btn-primary" id="book-<?=$row3['book_id'];?>" href="<?php echo base_url('bible/passage/'.$row3['name'].'/'.$ch_id);?>"><?=$row3['name'].' '.$ch_id;?></a>
    <?php endforeach; ?>
<?php endforeach; ?>