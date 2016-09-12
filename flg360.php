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

    /**
     * @var $term
     */
    public $term;

    /**
     * @var $cost;
     */
    public $cost;

    /**
     * @var $value;
     */
    public $value;

    /**
     * @var $title;
     */
    public $title;

    /**
     * @var $firstname
     */
    public $firstname;

    /**
     * @var $lastname
     */
    public $lastname;

    /**
     * @var $company
     */
    public $company;

    /**
     * @var $jobtitle
     */
    public $jobtitle;

    /**
     * @var $phone1
     */
    public $phone1;

    /**
     * @var $phone2
     */
    public $phone2;

    /**
     * @var $fax
     */
    public $fax;

    /**
     * @var $email
     */
    public $email;

    /**
     * @var $address1
     */
    public $address1;

    /**
     * @var $address2
     */
    public $address2;

    /**
     * @var $towncity
     */
    public $towncity;

    /**
     * @var $postcode
     */
    public $postcode;

    /**
     * @var $dobday
     */
    public $dobday;

    /**
     * @var $dobmonth
     */
    public $dobmonth;

    /**
     * @var $dobyear
     */
    public $dobyear;

    /**
     * @var $contacttime
     */
    public $contacttime;

    /**
     * @var array $customFields
     */
    public $customFields = array();

    /**
     * @var $xml
     */
    public $xml;



    public function __construct() {
        // Nothing yet
    }

    /**
     * createLead()
     *
     * Create a lead, check fields and send XML request,
     *
     * Successful call will return json array, Failure will return FALSE, field check will return FALSE.
     * @return bool|mixed
     */
    public function createLead() {
        if (TRUE == $this->checkFieldsCreateLead()) {
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
        $xml = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>";

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


        foreach ($this->customFields as $key => $value) {
            $xml .= "<data" . $key . ">" . $value . "</data" . $key . ">";
        }

        $xml .= "</lead>\n";
        $xml .= "</data>";

        $this->xml = $xml;
        return $xml;
    }

    /**
     * readLead()
     *
     * To be implemented
     *
     * @return bool
     */
    public function readLead() {

        // To be implemented
        return FALSE;
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

    /**
     * checkFieldsReadLead()
     *
     * To be implemented
     *
     * @return bool
     */
    private function checkFieldsReadLead() {
        return FALSE;
    }

    /**
     * checkFieldsUpdateLead()
     *
     * To be implemented
     *
     * @return bool
     */
    private function checkFieldsUpdateLead() {
        return FALSE;
    }

    /**
     * sendRequest()
     *
     * xml request
     *
     * @param $xml
     * @return mixed
     */
    private function sendRequest($xml) {


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->ServiceEndPoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/xml; charset=utf-8"));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);

        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode(json_encode(simplexml_load_string($data)), true);
    }
}