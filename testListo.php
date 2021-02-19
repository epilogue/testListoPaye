<?php
class Period
{
	public $dateDeb;
	public $dateFin;

	public __construct($dateDeb, $dateFin) {
		$this->dateDeb = $dateDeb;
		$this->dateFin = $datefin;
	}

	public function isIncludeDansPeriode(Absence $absence){
 		$include=false;

		if ($absence != null and $absence->dateFin > $this->dateDeb and $absence->dateDeb < $this->dateFin)
		{
		    $include=true;
		}

		return $include;
	}
}


class Absence extends Period
{
}

public function testIsIncludeDansPeriode(){

	$absence = new Absence(DateTime::createFromFormat('Ymd', "20210314"), DateTime::createFromFormat('Ymd', "20210314"));
	$p = new Period(DateTime::createFromFormat('Ymd', "20210301"), DateTime::createFromFormat('Ymd', "20210331"));

	$a2 = new Absence(DateTime::createFromFormat('Ymd', "20210225"), DateTime::createFromFormat('Ymd', "20210314"));
	$a3 = new Absence(DateTime::createFromFormat('Ymd', "20210314"), DateTime::createFromFormat('Ymd', "20210405"));
	$a4 = new Absence(DateTime::createFromFormat('Ymd', "20210225"), DateTime::createFromFormat('Ymd', "20210228"));

	$t1 = $p->isIncludeDansPeriode($absence);
	$t2 = $p->isIncludeDansPeriode($a2);
	$t3 = $p->isIncludeDansPeriode($a3);
	$t4 = $p->isIncludeDansPeriode($a4);

	$this->assert(true, ($t1 && $t2 && $t3 && !$t4));

}
