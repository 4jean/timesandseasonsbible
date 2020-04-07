<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cj_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function clear_cache()
    {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    function get_system_name()
    {
        return $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
    }

    function get_system_title()
    {
        return $this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
    }

    function get_system_url()
    {
        return $this->db->get_where('settings' , array('type'=>'system_url'))->row()->description;
    }

    /*******************  THE BIBLE  **********************/

    /** GO TO BOOK OF THE BIBLE **/
    function go_to_book($b, $c, $v='')
    {
        //$b = urldecode($b);
        /* Check if book contains a number
        if (strcspn($b, '0123456789') != strlen($b)) {
           $b = substr_replace($b, ' ', 1, 0);
        }*/
        //$b = $this->get_book_id($b);
        if($b < 1){
            return false;
        }
        if($c < 1){
            return $this->db->get_where('bible_kjv', array('b' => $b, 'c' => 1))->result_array();
        }
         if($v > 0){
             return $this->db->get_where('bible_kjv', array('b' => $b, 'c' => $c, 'v' => $v))->result_array();
         }
        return $this->db->get_where('bible_kjv', array('b' => $b, 'c' => $c))->result_array();
    }

    /** PASSAGE SELECTION **/
    function psg_sel($book_id, $ch_id)
    {
        $query = $this->db->get_where('bible_kjv', array('b' => $book_id, 'c' => $ch_id));
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    /*******************    META DATA  **********************/

    /** GET VERSES FOR META DATA **/
    function get_meta_verse($book_id = 1, $ch_id = 1, $value = '')
    {
        $v1 = $this->db->get_where('bible_kjv', array('b' => $book_id, 'c' => $ch_id, 'v' => 1));
        $v2 = $this->db->get_where('bible_kjv', array('b' => $book_id, 'c' => $ch_id, 'v' => 2));

        if($value == 'title'){
        if($v1->num_rows() > 0){
                $text = $v1->row()->t;
                $text = explode(' ', $text);
                return implode(' ', array_slice($text, 0, 5));
            }
        }

        if($value == 'description') {
            if ($v2->num_rows() > 0) {
                $text = $v1->row()->t . ' ' . $v2->row()->t;
                $text = explode(' ', $text);
                return implode(' ', array_slice($text, 0, 30));
            }
        }

        if($value == 'og_description') {
            $v3 = $this->db->get_where('bible_kjv', array('b' => $book_id, 'c' => $ch_id, 'v' => 3));
            $v4 = $this->db->get_where('bible_kjv', array('b' => $book_id, 'c' => $ch_id, 'v' => 4));
            $v5 = $this->db->get_where('bible_kjv', array('b' => $book_id, 'c' => $ch_id, 'v' => 5));
            if ($v5->num_rows() > 0) {
                $text = $v1->row()->t . ' ' . $v2->row()->t .' '.$v3->row()->t.' '.$v4->row()->t.' '.$v5->row()->t;
                $text = explode(' ', $text);
                return implode(' ', array_slice($text, 0, 50));
            }
            else {
                $text = $v1->row()->t . ' ' . $v2->row()->t;
                $text = explode(' ', $text);
                return implode(' ', array_slice($text, 0, 30));
            }
        }
        return false;
    }


    /** SEASON META DATA NOTES **/

    function season_meta_verse($book_id, $value = '')
    {
        $query = $this->db->get_where('notes_bk_season', array('book_id' => $book_id))->row()->notes;
        $text = strip_tags($query);

        if($value == 'title'){
            $text = explode(' ', $text);
            return implode(' ', array_slice($text, 0, 4));
        }

        if($value == 'description'){
            $text = explode(' ', $text);
            return implode(' ', array_slice($text, 0, 30));
        }
        if($value == 'og_description'){
            $text = explode(' ', $text);
            return implode(' ', array_slice($text, 0, 50));
        }
        return false;
    }

    /** SETS OF SEVEN META DATA NOTES **/

    function seven_meta_verse($book_id, $value = '')
    {
        $query = $this->db->get_where('notes_bk_sS7', array('book_id' => $book_id))->row()->notes;
        $text = strip_tags($query);

        if($value == 'title'){
            $text = explode(' ', $text);
            return implode(' ', array_slice($text, 0, 4));
        }

        if($value == 'description'){
            $text = explode(' ', $text);
            return implode(' ', array_slice($text, 0, 30));
        }
        if($value == 'og_description'){
            $text = explode(' ', $text);
            return implode(' ', array_slice($text, 0, 50));
        }
        return false;
    }

    /*******************    BOOKS  **********************/

	/** LIST ALL BOOKS **/
    function list_all_books()
    {
        return $this->db->get('books')->result_array();
    }

    /** GET BOOK NOTES OF SEASON **/
    function get_book_notes_season($book_name)
    {
        $book_id = $this->get_book_id($book_name);
        return $this->db->get_where('notes_bk_season', array('book_id' => $book_id))->result_array();
    }

    /** GET BOOK NOTES OF SS7 **/
    function get_book_notes_ss7($book_name)
    {
        $book_id = $this->get_book_id($book_name);
        return $this->db->get_where('notes_bk_ss7', array('book_id' => $book_id))->result_array();
    }

    /** GET BOOK ABBREVIATION **/
    function get_abbr($book_id)
    {
        return $this->db->get_where('books', array('book_id' => $book_id))->row()->abbr;
    }

    /** GET PREVIOUS CHAPTER **/
    function get_prev($book_id, $chapter)
    {
        if (($book_id + $chapter) > 2){
            $ch_id = $chapter - 1;
            $query = $this->db->get_where('bible_kjv', array('b' => $book_id, 'c' => $ch_id));
            if($query->num_rows() > 0) {
                $book_name = $this->get_book_name($book_id);
                return array('book' => $book_name, 'chapter' => $ch_id);
            }
            else{
                $book_id = $book_id - 1;
                $ch_id = $this->db->get_where('books', array('book_id' => $book_id))->row()->chapters;
                $book_name = $this->get_book_name($book_id);
                return array('book' => $book_name, 'chapter' => $ch_id);
            }
        }
        return false;
    }

    /** GET NEXT CHAPTER **/
    function get_next($book_id, $chapter)
    {
        if (($book_id + $chapter) < 88){
            $ch_id = $chapter + 1;
            $query = $this->db->get_where('bible_kjv', array('b' => $book_id, 'c' => $ch_id));
            if($query->num_rows() > 0) {
                $book_name = $this->get_book_name($book_id);
                return array('book' => $book_name, 'chapter' => $ch_id);
            }
            else{
                $book_id = $book_id + 1;
                $ch_id = 1;
                $book_name = $this->get_book_name($book_id);
                return array('book' => $book_name, 'chapter' => $ch_id);
            }
        }
        return false;
    }

    /** SEARCH FOR BOOK NAME **/
    function bk_search($book_name)
    {
        $this->db->like('name', $book_name, 'after');
        return $this->db->get('books')->result_array();
    }

    /** GET BOOKS ID **/
    function get_books_id($range)
    {
        $r = explode(',', $range);
        if (count($r) > 2){
            $books_id = range($r[0], $r[1], $r[2]);
        }
        else{
            $books_id = range($r[0], $r[1]);
        }
        return $books_id;
    }

    function get_book_name($book_id)
    {
        return $this->db->get_where('books', array('book_id' => $book_id))->row()->name;
    }

    /** LIST ALL BOOKS BY SEASON **/
    function get_season_books($bk_season_id)
    {
        $range = $this->db->get_where('bk_season', array('bk_season_id '=> $bk_season_id))->row()->ranges;
       $books_id = $this->get_books_id($range);
        return $this->list_bks($books_id);
    }

    function get_season_notes($season_id)
    {
        return $this->db->get_where('notes_season', array('season_id' => $season_id))->result_array();
    }

    /** LIST ALL BOOKS IN SETS OF SEVEN **/
    function get_ss7_books($bk_ss7_id)
    {
        $range = $this->db->get_where('bk_ss7', array('bk_ss7_id '=> $bk_ss7_id))->row()->ranges;
        $books_id = $this->get_books_id($range);
        return $this->list_bks($books_id);
    }

    /** LIST BOOKS BY ID **/
    function list_bks($book_id)
    {
        $this->db->where_in('book_id', $book_id);
        return $this->db->get('books')->result_array();
    }

    /** GET BOOK NAME BY ID **/
    function get_book_id($book_name)
    {
        $book_name = urldecode($book_name);
        $this->db->like('name', $book_name, 'after');
        $query = $this->db->get('books');
        if($query->num_rows() < 1){
            return false;
        }
        return $query->row()->book_id;
    }

    /** LIST OLD TESTAMENT BOOKS **/
    function get_old_books()
    {
        return $this->db->get_where('books', array('testament' => 0))->result_array();
    }

    /** LIST NEW TESTAMENT BOOKS **/
    function get_new_books()
    {
        return $this->db->get_where('books', array('testament' => 1))->result_array();
    }

    /*******************    CHAPTERS  **********************/

    /** GET ALL CHAPTER DETAILS IN SEASON **/
    function get_all_ch_seasons()
    {
        return $this->db->get('ch_season')->result_array();
    }

    /** GET ALL CHAPTER DETAILS IN SS7 **/
    function get_all_ch_ss7()
    {
        return $this->db->get('ch_ss7')->result_array();
    }

    /** LIST ALL BOOKS OF SEASON CHAPTER **/
    function get_ch_season_books($ch_season_id)
    {
        $data = array();
        $range = $this->db->get_where('ch_season', array('ch_season_id '=> $ch_season_id))->row()->ranges;
        $ch_id = $this->get_chapters_id($range);
        $books_id = $this->list_bks_by_ch_id($ch_id);
        foreach ($books_id as $row){
            $books = $this->list_bks($row['b']);
           foreach($books as $row2){
               $data[] = $row2;
           }
        }
        return $data;
    }

    /** LIST ALL CHAPTERS OF SEASON CHAPTER **/
    function get_ch_season_chapters($ch_season_id)
    {
        $range = $this->db->get_where('ch_season', array('ch_season_id '=> $ch_season_id))->row()->ranges;
        return $this->get_chapters_id($range);
    }

    /** LIST ALL CHAPTERS OF SS7 CHAPTER **/
    function get_ch_ss7_chapters($ch_ss7_id)
    {
        $range = $this->db->get_where('ch_ss7', array('ch_ss7_id '=> $ch_ss7_id))->row()->ranges;
        return $this->get_chapters_id($range);
    }

    /** LIST ALL CHAPTERS IN SETS OF SEVEN **/
    function get_ch_ss7_books($ch_ss7_id)
    {
        $data = array();
        $range = $this->db->get_where('ch_ss7', array('ch_ss7_id '=> $ch_ss7_id))->row()->ranges;
        $ch_id = $this->get_chapters_id($range);
        $books_id = $this->list_bks_by_ch_id($ch_id);
        foreach ($books_id as $row){
            $books = $this->list_bks($row['b']);
            foreach($books as $row2){
                $data[] = $row2;
            }
        }
        return $data;
    }

    /** GET CHAPTERS ID **/
    function get_chapters_id($range)
    {
        $r = explode(',', $range);
        if (count($r) > 2){
            $chapter_id = range($r[0], $r[1], $r[2]);
        }
        else{
            $chapter_id = range($r[0], $r[1]);
        }
        return $chapter_id;
    }

    /** LIST BOOKS BY CHAPTER ID **/
    function list_bks_by_ch_id($chapter_id)
    {
        if(is_array($chapter_id)){
            $chapter_id = implode(',',$chapter_id);
        }
        $sql = "SELECT DISTINCT b FROM `bible_kjv` WHERE c in ($chapter_id)";
        return $this->db->query($sql)->result_array();
    }

    /** GET ALL CHAPTERS OF BOOK **/
    function get_bk_chapters($book_id)
    {
        return $this->db->get_where('bible_kjv', array('b' => $book_id))->result_array();
    }

    /*******************  SEASON  **********************/
    function get_all_seasons()
    {
        return $this->db->get('season')->result_array();
    }
    /*******************  SS7  **********************/
    function get_all_ss7()
    {
        return $this->db->get('ss7')->result_array();
    }

    function get_ss7_notes($ss7_id)
    {
        return $this->db->get_where('notes_ss7', array('ss7_id' => $ss7_id))->result_array();
    }

    /*******************  SETS OF 49  **********************/

    /** GET SS49 RANGE **/
    function get_ss49_range($range)
    {
        $r = explode(',', $range);
        if (count($r) > 2){
            $ss49_range = range($r[0], $r[1], $r[2]);
        }
        else{
            $ss49_range = range($r[0], $r[1]);
        }
        return $ss49_range;
    }

    /** LIST ALL SEASONS IN SETS OF 49 **/
    function get_ss49_seasons($season_id, $ss_49_id)
    {
        $range = $this->db->get_where('ss_49_season', array('season_id '=> $season_id, 'ss_49_id' => $ss_49_id))->row()->ranges;
        return $this->get_ss49_range($range);
    }

    /** LIST SETS OF 49 VY ID **/
    function get_ss49($ss_49_id)
    {
        return $this->db->get_where('ss_49', array('ss_49_id' => $ss_49_id))->result_array();
    }

    /** LIST ALL BOOKS BY SEASON IN SETS OF 49 **/
    function get_ss49_season_books($season_id, $ss_49_id)
    {
        $range = $this->db->get_where('ss_49_season', array('season_id '=> $season_id, 'ss_49_id' => $ss_49_id))->row()->ranges;
        $books_id = $this->get_books_id($range);
        return $this->list_bks($books_id);
    }

    /** KNOW YOUR SEASON (Enter a number) **/
    function kys($num)
    {
        $div = 1;
        if ($num > 49){
            $div = $num / 49;
            $div = (int) $div;
            $mod = $num % 49;
            if($mod > 0){
                $div ++;
            }
        }
       return $this->get_ss49($div);
    }

    /*UPDATE DOWNLOAD COUNT*/
    function update_download_count($file_name)
    {
       $count = $this->db->get_where('downloads', array('file_name'=>$file_name))->row()->download_count;
        $data = array('download_count'=> $count + 1);
        $this->db->where(array('file_name' => $file_name));
        return $this->db->update('downloads', $data);
    }
}