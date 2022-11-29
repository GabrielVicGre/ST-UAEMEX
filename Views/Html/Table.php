<?php

namespace View\Html;

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "/SistemaTutoriaFIUAEMex/View/Graphics/Displayable.php");

use View\Graphics\Displayable;

abstract class Table implements Displayable
{
    protected $col_names;
    protected $data;

    function __construct($col_names, $data)
    {
        $this->col_names = $col_names;
        $this->data = $data;
    }
}

class RoundedTable extends Table
{

    function __construct($col_names, $data)
    {
        parent::__construct($col_names,$data);
    }

    function display()
    {
        ?>
            <div class="tbl-container radius-scroll">
                <table>
                    <tbody>
                        <tr>
                            <?php
                                foreach ($this->col_names as &$name) {
                            ?>
                            <th><?php echo $name; ?></th>
                            <?php        
                                }
                            ?>
                        </tr>
                            <?php
                                foreach ($this->data as &$row) {
                            ?>
                        <tr>
                            <?php
                                    foreach($row as &$item) {
                                        ?>
                                            <td>
                                            <?php 
                                                if($item instanceof Displayable) {
                                                    $item->display();
                                                } else {
                                                    echo $item;
                                                } 
                                            ?>
                                            </td>
                                        <?php
                                    }
                            ?>
                        </tr>
                            <?php
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        <?php
    }
}