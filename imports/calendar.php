<?php

class Calendar {  
     
    /**
     * Constructor
     */
    public function __construct(){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
     
    /********************* PROPERTY ********************/  
    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
     
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
     
    private $naviHref= null;
     
    /********************* PUBLIC **********************/  
        
    /**
    * print out the calendar
    */
    public function show() {
        $year  == null;
         
        $month == null;
         
        if(null==$year&&isset($_GET['year'])){
 
            $year = $_GET['year'];
         
        }else if(null==$year){
 
            $year = date("Y",time());  
         
        }          
         
        if(null==$month&&isset($_GET['month'])){
 
            $month = $_GET['month'];
         
        }else if(null==$month){
 
            $month = date("m",time());
         
        }                  
         
        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         
        $this->daysInMonth=$this->_daysInMonth($month,$year);  
         
        $content='<div id="calendar">'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label">'.$this->_createLabels().'</ul>';   
                                $content.='<div class="clear"></div>';     
                                $content.='<ul class="dates">';    
                                 
                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                     
                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j);
                                    }
                                }
                                 
                                $content.='</ul>';
                                 
                                $content.='<div class="clear"></div>';     
             
                        $content.='</div>';
                 
        $content.='</div>';
        return $content;   
    }
     
    /********************* PRIVATE **********************/ 
    /**
    * create the li element for ul
    */
    private function _showDay($cellNumber){
         
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 
                $this->currentDay=1;
                 
            }
        }
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
             
            $cellContent = $this->currentDay;
             
            $this->currentDay++;   
             
        }else{
             
            $this->currentDate =null;
 
            $cellContent=null;
        }


            $cssClass = '';
            $dateDetails = '';


        $servername = "localhost";
        $username = "";
        $password = "";
        $dbname = "";

        $cssClass = '';
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "SELECT STATUS, VENUE, STARTTIME, USERNAME FROM BOOKINGS WHERE BOOKDATE='".$this->currentDate."'";
        $result = $conn->query($sql);
            $unassigned = 0;
            $pending = 0;
            $confirmed = 0;
        if ($result->num_rows > 0) {                                            
        // output data of each row
        while($row = $result->fetch_assoc()) {

                

                if($row["STATUS"] == "Pending") {
                $pending++;
                } elseif($row["STATUS"] == "Unassigned") {
                $unassigned++;
                } elseif($row["STATUS"] == "Confirmed") {
                $confirmed++; 
                }   

                    if ($confirmed > 0) {
                     $cssClass = "confirmed";
                     $toolTip = 'data-toggle="tooltip" data-placement="top" title="'.$confirmed.' Confirmed Gigs"';
                    }
                     if ($pending > 0) {
                     $cssClass = "pending";
                     $toolTip = 'data-toggle="tooltip" data-placement="top" title="'.$pending.' Pending Gigs"';
                    }
                    if ($unassigned > 0) {
                     $cssClass = "unassigned";
                     $toolTip = 'data-toggle="tooltip" data-placement="top" title="'.$unassigned.' Unassigned Gigs"';
                    }  
                    $jsDateClick = "reply_click('li-" . $this->currentDate."','".$row["STATUS"]."')";                   
                    
                                             
            }
        }
        $conn->close();

              
         

            if(date("Y-m-d") == $this->currentDate) {
                $cssClass .= ' todayHighlight';
                $dateDetails = '<span class="dateDetails">TODAY</span>';
            } else if ($cssClass == null) {
                $cssClass = "date";
            }

            if($jsDateClick == null) {
                $jsDateClick = "reply_click('li-" . $this->currentDate."','Open')";  
            }



            return '<li id="li-'.$this->currentDate.'" onclick="'.$jsDateClick.'" class="'.$cssClass." ".($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).($cellContent==null?'mask':'').'" '.$toolTip.'>'.$cellContent."</br>".$dateDetails.'</li>';
    }
     
    /**
    * create navigation
    */
    private function _createNavi(){
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
         
        return
            '<div class="header">'.
                '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>'.
                    '<span class="title OswaldFont" style="text-transform: uppercase;">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
                '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>'.
            '</div>';
    }
         
    /**
    * create calendar week labels
    */
    private function _createLabels(){  
                 
        $content='';
         
        foreach($this->dayLabels as $index=>$label){
             
            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';
 
        }
         
        return $content;
    }
     
     
     
    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){
         
        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
             
            $numOfweeks++;
         
        }
         
        return $numOfweeks;
    }
 
    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
     
}