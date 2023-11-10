<?php
<<<<<<< HEAD
    class APIView {
        public function response($data, $status) {
            header("Content-Type: application/json");
            header("HTTP/1.1 " .$status . " " .$this->_requestStatus($status));
            json_encode($data);
        }
        private function _requestStatus($code) {
            $status = array(
                200 => "OK",
                404 => "Not found",
                500 => "Internal Server Error"
            );
            return (isset($status[$code]))? $status[$code] : $status[500];
        }
    }
=======
class APIView
{
    public function response($data, $status)
    {
    }

    private function _requestStatus($code)
    {
    }
}
>>>>>>> 32af6421dee1b62c9c9a51260e15e6098accbc60
