<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'third_party/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Dompdf_gen extends Dompdf {
    public function __construct() {
        parent::__construct();
    }
}
?>
