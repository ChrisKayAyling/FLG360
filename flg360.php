<?php
namespace FLG360;

class flg360
{
    /**
     * @var $ServiceEndPoint - End point for FLG Service
     */
    public $ServiceEndPoint;

    /**
     * @var $key - API Key for FLG Service
     */
    public $key;

    /* FLG Fields */

    public $leadgroup;
    public $site;
    public $introducer;
    public $reference;
    public $source;
    public $medium;
    public $term;
    public $cost;
    public $value;
    public $title;
    public $firstname;
    public $lastname;
    public $company;
    public $jobtitle;
    public $phone1;
    public $phone2;
    public $fax;
    public $email;
    public $address1;
    public $address2;
    public $towncity;
    public $postcode;
    public $dobday;
    public $dobmonth;
    public $dobyear;
    public $contacttime;

    public $customFields = array();



    public function __construct() {

    }

    public function createLead() {
        if ($this->checkFieldsCreateLead()) {
            $xml = $this->constructCreateRequest();
            if ($xml) {
                return $this->sendRequest($xml);
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * constructCreateRequest - Create 'create' request for FLG Lead
     * @return string
     */
    private function constructCreateRequest() {
        $xml = "";

        $xml .= "<data>\n";
        $xml .= "<lead>\n";

        $xml .= "<key>" . $this->key . "</key>\n";

        if ($this->leadgroup) {
            $xml .= "<leadgroup>" . $this->leadgroup . "</leadgroup>\n";
        }

        if ($this->site) {
            $xml .= "<site>" . $this->site . "</site>\n";
        }

        if ($this->introducer) {
            $xml .= "<introducer>" . $this->introducer . "</introducer>\n";
        }

        if ($this->reference) {
            $xml .= "<reference>" . $this->reference . "</reference>\n";
        }

        if ($this->source) {
            $xml .= "<source>" . $this->source . "</source>\n";
        }

        if ($this->medium) {
            $xml .= "<medium>" . $this->medium . "</medium>\n";
        }

        if ($this->term) {
            $xml .= "<term>" . $this->term . "</term>\n";
        }

        if ($this->cost) {
            $xml .= "<cost>" . $this->cost . "</cost>\n";
        }

        if ($this->value) {
            $xml .= "<value>" . $this->value . "</value>\n";
        }

        if ($this->title) {
            $xml .= "<title>" . $this->title . "</title>\n";
        }

        if ($this->firstname) {
            $xml .= "<firstname>" . $this->firstname . "</firstname>\n";
        }

        if ($this->lastname) {
            $xml .= "<lastname>" . $this->lastname . "</lastname>\n";
        }

        if ($this->company) {
            $xml .= "<company>" . $this->company . "</company>\n";
        }

        if ($this->jobtitle) {
            $xml .= "<jobtitle>" . $this->jobtitle . "</jobtitle>\n";
        }

        if ($this->phone1) {
            $xml .= "<phone1>" . $this->phone1 . "</phone1>\n";
        }

        if ($this->phone2) {
            $xml .= "<phone2>" . $this->phone2 . "</phone2>\n";
        }

        if ($this->fax) {
            $xml = "<fax>" . $this->fax . "</fax>\n";
        }

        if ($this->email) {
            $xml .= "<email>" . $this->email . "</email>\n";
        }

        if ($this->address1) {
            $xml .= "<address>" . $this->address1 . "</address>\n";
        }

        if ($this->address2) {
            $xml .= "<address2>" . $this->address2 . "</address2>\n";
        }

        if ($this->towncity) {
            $xml .= "<towncity>" . $this->towncity . "</towncity>\n";
        }

        if ($this->postcode) {
            $xml .= "<postcode>" . $this->postcode . "</postcode>\n";
        }

        if ($this->dobday) {
            $xml .= "<dobday>" . $this->dobday . "</dobday>\n";
        }

        if ($this->dobmonth) {
            $xml .= "<dobmonth>" . $this->dobmonth . "</dobmonth>\n";
        }

        if ($this->dobyear) {
            $xml .= "<dobyear>" . $this->dobyear . "</dobyear>\n";
        }

        if ($this->contacttime) {
            $xml .= "<contacttime>" . $this->contacttime . "</contacttime>\n";
        }

        $i = 1;
        foreach ($this->customFields as $field) {
            $xml .= "<data" . $i . ">" . $field . "</data" . $i . ">";
        }

        $xml .= "</lead>\n";
        $xml .= "</data>";

        return $xml;
    }


    public function readLead() {

    }


    /**
     * checkFieldsCreateLead - Check all fields required for a create
     * @return bool
     */
    private function checkFieldsCreateLead() {
        if (!$this->leadgroup) {
            return FALSE;
        }

        if (!$this->title) {
            return FALSE;
        }

        if (!$this->firstname) {
            return FALSE;
        }

        if (!$this->lastname) {
            return FALSE;
        }

        if (!$this->company) {
            return FALSE;
        }

        if (!$this->jobtitle) {
            return FALSE;
        }

        if (!$this->phone1) {
            return FALSE;
        }

        if (!$this->email) {
            return FALSE;
        }

        if (!$this->address1) {
            return FALSE;
        }

        if (!$this->address2) {
            return FALSE;
        }

        if (!$this->towncity) {
            return FALSE;
        }

        if (!$this->postcode) {
            return FALSE;
        }



        return TRUE;
    }

    private function checkFieldsReadLead() {

    }

    private function checkFieldsUpdateLead() {

    }

    private function sendRequest($xml) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->ServiceEndPoint);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=" . $xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);

        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode(json_encode(simplexml_load_string($data)), true);
    }
}