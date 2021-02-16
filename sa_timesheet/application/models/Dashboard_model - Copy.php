<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	public function __construct()
	{
	// Call the CI_Model constructor
	parent::__construct();
	$this->load->database();
	$this->load->library('Multipledb');
	}
	public function checkUser($username,$password)
	{
		$this->db->select('*');
		$this->db->from('adminuser');
		$this->db->where('AU_LoginID',$username);
		$this->db->where('AU_Password',$password);
		$this->db->where('AU_LiveStatus','1');
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query->result();
	}
	 
	public function totalschools()
	{
		$query = $this->db->query("SELECT count(ssb.id) as totschool FROM skillangels_schoolbranch ssb JOIN skillangels_school ss on ssb.schoolcode=ss.schoolcode");
		
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function totalusers()
	{
		$query = $this->db->query("SELECT count(id) as totusers FROM skillangels_users WHERE status=1 and current_year_status=1");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	} 
	public function school_name()
	{
		$query = $this->db->query("SELECT upper(ssb.branchname) as schoolname,ssb.id as sid FROM skillangels_schoolbranch ssb JOIN skillangels_school ss on ssb.schoolcode=ss.schoolcode");
		
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	} 
	public function userdetails($schoolid)
	{	
		//echo "hello"; exit;If you’re using a version of PostgreSQL that’s older than 9.4, you’ll need to use the CASE WHEN clause instead of FILTER.
		$query = $this->db->query("select grade_id,
		(SELECT upper(ssb.branchname) as schoolname FROM skillangels_schoolbranch ssb JOIN skillangels_school ss on ssb.schoolcode=ss.schoolcode where ssb.id='".$schoolid."'limit 1),
		(select gradename from skillangels_grade where id=grade_id) as gradename,sectionname,count(uid) as TotalUsers,
        COUNT(userscore) filter (where userscore='Completed' or userscore='Incomplete') as  UserTakenAssessment,
        COUNT(userscore) filter (where userscore='Completed') as  CompletedUserInAssessment,
        COUNT(userscore) filter (where userscore='P') as  PendingUserInAssessment,
        COUNT(userscore) filter (where userscore='Incomplete') as  In_CompleteUserInAssessment
        from
        (select u.id as uid,user_name,g.gradename,sectionname,g.id as grade_id,
        (select CASE  WHEN  count(distinct game_id) = 5 THEN 'Completed' WHEN  count(distinct game_id) < 5 and count(distinct game_id)>0 THEN 'Incomplete'
        WHEN  count(distinct game_id)=0 THEN 'P' END as status from skillangels_userscore as us
        where us.user_id=u.id and ass_status_id=1) as userscore
        from skillangels_users as u
        join skillangels_schoolgradesections as sec on sec.id=u.section_id
        join skillangels_schoolgrade as sg on sec.gradeid=sg.id
        join skillangels_grade as g on g.id=sg.gradeid
        where u.branch_id='".$schoolid."' and u.status='1' and u.current_year_status=1 ) as a1 group by grade_id,sectionname order by grade_id asc");	
		 //echo $this->db->last_query(); exit;
        return $query->result_array();
	}  
	
/*	public function user_skillreport($schoolid)
	{	//echo "hello"; exit;
		$query = $this->db->query("select grade_id,(select gradename from skillangels_grade where id=grade_id) as gradename,
		(select max(date) from skillangels_userscore  where user_id=uid and ass_status_id=1) as dates,name,
		sectionname,user_name,memory,VP,FA,PS,L from
		 (select u.id as uid,user_name,name,g.gradename,sectionname,g.id as grade_id,
		 (select score from skillangels_userscore as us
		 where us.user_id=u.id and ass_status_id=1 and game_id in
		(select game_id from skillangels_gamemaster gmm where gmm.skill_id='1')limit 1) as memory,
		 (select score from skillangels_userscore as us
		 where us.user_id=u.id and ass_status_id=1 and game_id in
		(select game_id from skillangels_gamemaster gmm where gmm.skill_id='2' )limit 1) as VP,
		  (select score from skillangels_userscore as us
		 where us.user_id=u.id and ass_status_id=1 and game_id in
		(select game_id from skillangels_gamemaster gmm where gmm.skill_id='3' )limit 1) as FA,
		  (select score from skillangels_userscore as us
		 where us.user_id=u.id and ass_status_id=1 and game_id in
		(select game_id from skillangels_gamemaster gmm where gmm.skill_id='4' )limit 1) as ps,
		  (select score from skillangels_userscore as us
		 where us.user_id=u.id and ass_status_id=1 and game_id in
		(select game_id from skillangels_gamemaster gmm where gmm.skill_id='5' )limit 1) as L
		 from skillangels_users as u
		 join skillangels_schoolgradesections as sec on sec.id=u.section_id
		 join skillangels_schoolgrade as sg on sec.gradeid=sg.id
		 join skillangels_grade as g on g.id=sg.gradeid
		 where u.branch_id='".$schoolid."' and u.status=1) as a1
		group by grade_id,sectionname,user_name,name,memory,VP,FA,PS,L,dates order by grade_id asc");	
		 //echo $this->db->last_query(); exit;
        return $query->result_array();
	} */
	public function user_skillreport($schoolid)
	{
		$query = $this->db->query("select grade_id,(select gradename from skillangels_grade where id=grade_id) as gradename,
		(SELECT upper(ssb.branchname) as schoolname FROM skillangels_schoolbranch ssb JOIN skillangels_school ss on ssb.schoolcode=ss.schoolcode where ssb.id='".$schoolid."'limit 1),
		(select max(date) from skillangels_userscore  where user_id=uid and ass_status_id=1) as dates,name,
		sectionname,user_name,memory,vp,fa,ps,l from
		(select u.id as uid,user_name,name,g.gradename,sectionname,g.id as grade_id,

		(select score from skillangels_userscore us where us.user_id=u.id and ass_status_id=1 and game_id in
		(select gcg.game_id from skillangels_gradecyclegame gcg  join skillangels_branchgradecyclegame bgcg on gcg.gcg_id=bgcg.gcg_id  and bgcg.branch_id='".$schoolid."' join skillangels_gamemaster gm on gm.game_id=gcg.game_id and gm.skill_id=1 where gcg.assess_status_id=1 and gcg.cycle_id=0)limit 1) as memory,

		(select score from skillangels_userscore us where us.user_id=u.id and ass_status_id=1 and game_id in
		(select gcg.game_id from skillangels_gradecyclegame gcg  join skillangels_branchgradecyclegame bgcg on gcg.gcg_id=bgcg.gcg_id  and bgcg.branch_id='".$schoolid."' join skillangels_gamemaster gm on gm.game_id=gcg.game_id and gm.skill_id=2 where gcg.assess_status_id=1 and gcg.cycle_id=0)limit 1) as vp,

		(select score from skillangels_userscore us where us.user_id=u.id and ass_status_id=1 and game_id in
		(select gcg.game_id from skillangels_gradecyclegame gcg  join skillangels_branchgradecyclegame bgcg on gcg.gcg_id=bgcg.gcg_id  and bgcg.branch_id='".$schoolid."' join skillangels_gamemaster gm on gm.game_id=gcg.game_id and gm.skill_id=3 where gcg.assess_status_id=1 and gcg.cycle_id=0)limit 1) as fa,

		(select score from skillangels_userscore us where us.user_id=u.id and ass_status_id=1 and game_id in
		(select gcg.game_id from skillangels_gradecyclegame gcg  join skillangels_branchgradecyclegame bgcg on gcg.gcg_id=bgcg.gcg_id  and bgcg.branch_id='".$schoolid."' join skillangels_gamemaster gm on gm.game_id=gcg.game_id and gm.skill_id=4 where gcg.assess_status_id=1 and gcg.cycle_id=0)limit 1) as ps,

		(select score from skillangels_userscore us where us.user_id=u.id and ass_status_id=1 and game_id in
		(select gcg.game_id from skillangels_gradecyclegame gcg  join skillangels_branchgradecyclegame bgcg on gcg.gcg_id=bgcg.gcg_id  and bgcg.branch_id='".$schoolid."' join skillangels_gamemaster gm on gm.game_id=gcg.game_id and gm.skill_id=5 where gcg.assess_status_id=1 and gcg.cycle_id=0)limit 1) as l

		from skillangels_users as u
		 join skillangels_schoolgradesections as sec on sec.id=u.section_id
		 join skillangels_schoolgrade as sg on sec.gradeid=sg.id 
		 join skillangels_grade as g on g.id=sg.gradeid
		 where u.branch_id='".$schoolid."' and u.status=1 and u.current_year_status=1) as a1
		group by grade_id,sectionname,user_name,name,memory,vp,fa,ps,l,dates order by grade_id asc");
		 //echo $this->db->last_query(); exit;
        return $query->result_array();
	}

	public function userbspireport($schoolid)
	{ 
		$query = $this->db->query("select gradename,(SELECT upper(ssb.branchname) as schoolname FROM skillangels_schoolbranch ssb JOIN skillangels_school ss on ssb.schoolcode=ss.schoolcode where ssb.id='".$schoolid."' limit 1),
            count(lessthantwenty) as a1,
            count(twentytoforty) as a2,
            count(fortytosixty) as a3,
            count(sixtytoeighty) as a4,
            count(greatereithy) as a5 from
            (SELECT section_id,round(AVG(score),2) as finalscore,count(DISTINCT game_id) as PlayedGame,
            case when (AVG(score)) <=20 then '<=20' END as lessthantwenty,
            case when (AVG(score)) >20 and (AVG(score)) <=40 then '20-40' end as twentytoforty,
            case when (AVG(score)) >40 and (AVG(score)) <=60 then '40-60' END as fortytosixty,
            case  when (AVG(score)) >60 and (AVG(score)) <=80 then '60-80' end as sixtytoeighty,
            case when (AVG(score)) >80 then '>80' end as greatereithy
            from skillangels_userscore as gd JOIN skillangels_users as u ON gd.user_id=u.id where ass_status_id=1 and u.status=1 and u.current_year_status=1 and u.branch_id='".$schoolid."'
            group BY u.id) as x1 join skillangels_schoolgradesections as sec on sec.id=x1.section_id
            join skillangels_schoolgrade as sg on sec.gradeid=sg.id
            join skillangels_grade as g on g.id=sg.gradeid where PlayedGame=5
            group by gradename order by gradename asc ");
 
    //echo $this->db->last_query(); exit;

		 // echo $this->db->last_query(); exit;
        return $query->result_array();
	} 
 
/*	public function user_skillreport($schoolid)
	{
		$query = $this->db->query("select grade_id,(select gradename from skillangels_grade where id=grade_id) as gradename,
		(select max(date) from skillangels_userscore  where user_id=uid and ass_status_id=1) as dates,name,
		sectionname,user_name,gameid_score from
		 (select u.id as uid,user_name,name,g.gradename,sectionname,g.id as grade_id, 
		  (select array_cat(array_agg(game_id), array_agg(score)) gameid_score
		 from skillangels_userscore as us
		 where us.user_id=u.id and ass_status_id=1) as gameid_score  
		 from skillangels_users as u
		 join skillangels_schoolgradesections as sec on sec.id=u.section_id
		 join skillangels_schoolgrade as sg on sec.gradeid=sg.id
		 join skillangels_grade as g on g.id=sg.gradeid
		 where u.branch_id='".$schoolid."' and u.status=1) as a1
		group by grade_id,sectionname,user_name,name,gameid_score,dates order by grade_id asc");
		 //echo $this->db->last_query(); exit;
        return $query->result_array();
		
		$query = $this->db->query("select grade_id,(select gradename from skillangels_grade where id=grade_id) as gradename,sectionname,count(uid) as TotalUsers,
        COUNT(userscore) filter (where userscore='Completed' or userscore='Incomplete') as  UserTakenAssessment,
        COUNT(userscore) filter (where userscore='Completed') as  CompletedUserInAssessment,
        COUNT(userscore) filter (where userscore='P') as  PendingUserInAssessment,
        COUNT(userscore) filter (where userscore='Incomplete') as  In_CompleteUserInAssessment
        from
        (select u.id as uid,user_name,g.gradename,sectionname,g.id as grade_id,
        (select CASE  WHEN  count(user_id) = 5 THEN 'Completed' WHEN  count(user_id) < 5 and count(user_id)>0 THEN 'Incomplete'
        WHEN  count(user_id)=0 THEN 'P' END as status from skillangels_userscore as us
        where us.user_id=u.id and ass_status_id=1) as userscore
        from skillangels_users as u
        join skillangels_schoolgradesections as sec on sec.id=u.section_id
        join skillangels_schoolgrade as sg on sec.gradeid=sg.id
        join skillangels_grade as g on g.id=sg.gradeid
        where u.branch_id='".$schoolid."' and u.status='1' and u.current_year_status=1 ) as a1 group by grade_id,sectionname order by grade_id asc");
	}*/
	 

}
