<?php
/**
 * cjwy_survey 金表数据
 * ============================================================================
 *
*/
load()->func('tpl');
global $_GPC,  $_W;
$uniacid = $_W["uniacid"];
$rid = intval( $_GPC['id'] );
$act = $_GPC['act'];
//表单基本信息
$sinfo = pdo_fetch('SELECT * FROM '.tablename('cjwy_survey')." WHERE rid = :rid AND uniacid = :uniacid", array(':uniacid' => $uniacid, ':rid'=>$rid) );
if( empty($sinfo) ){
	message('参数错误!',  '', 'error');
}
//取出表单选项列表
$question_list = pdo_fetchall('SELECT * FROM '.tablename('cjwy_survey_question')." WHERE sid = :sid AND uniacid = :uniacid ORDER BY sort ASC, sqid ASC", array(':uniacid' => $uniacid, ':sid'=>$sinfo['sid']) );
foreach ($question_list as $key => $val) {
	$question_list[$key]['extra'] = explode("\n", $val['extra']);
}

if( $act == 'detail_list' ){
	$pindex = max(1, intval($_GPC['page']));
	$psize = 20;

	$answer_list = $uids = $userinfo = array();
	$sql = 'SELECT uid,created FROM '.tablename('cjwy_survey_answer')." WHERE sid = :sid AND uniacid = :uniacid GROUP BY uid ORDER BY said DESC ";
	$usersList = pdo_fetchall("{$sql} LIMIT ". ($pindex -1) * $psize . ',' .$psize , array(':uniacid' => $uniacid, ':sid'=>$sinfo['sid']) );
	$total = pdo_fetchcolumn( "SELECT COUNT(*) FROM ({$sql}) AS t", array(':uniacid' => $uniacid, ':sid'=>$sinfo['sid']) );
	$pager = pagination($total, $pindex, $psize);

	foreach ($usersList as $val) {
		$results = pdo_fetchall('SELECT * FROM '.tablename('cjwy_survey_answer').' WHERE sid = :sid AND uid = :uid', array(':sid'=>$sinfo['sid'], ':uid'=>$val['uid']), 'sqid');
		$tmp = array();
		foreach ($question_list as $question) {
			$tmp[$question['sqid']] = $results[$question['sqid']]['content'];
		}
		$answer_list[] = array(
			'uid'	=>	$val['uid'],
			'created'	=>	$val['created'],
			'totals'	=>	$tmp,
		);
		$uids[] = $val['uid'];
	}
	if( $uids ){
		$userinfo = pdo_fetchall('SELECT realname,mobile,uid FROM '.tablename('mc_members').' WHERE uid IN('.implode(',', $uids).')', array(), 'uid');
	}
	include $this->template('answer_detail_list');
}elseif ( $act == 'detail_view') {
	$uid = intval($_GPC['uid']);
	$answer = pdo_fetchall('SELECT * FROM '.tablename('cjwy_survey_answer').' WHERE sid = :sid AND uid = :uid', array(':sid'=>$sinfo['sid'], ':uid'=>$uid), 'sqid');
	
	if( empty($answer) ){
		message('参数错误!',  '', 'error');
	}
	$userinfo = pdo_fetch('SELECT realname,mobile FROM '.tablename('mc_members').' WHERE uid=:uid', array(':uid'=>$uid));
	include $this->template('answer_detail_view');
} else {
	foreach ($question_list as &$val) {
		//统计各项情况
		$val['totals'] = array();
		if( !in_array($val['type'], array('text','textarea')) ){
			$totals = pdo_fetchall('SELECT COUNT(*) AS tnum, content FROM '.tablename('cjwy_survey_answer').' WHERE sqid = '.$val['sqid'].' GROUP BY content', array(), 'content');
			foreach ($val['extra'] as $vtitle) {
				$vtitle = trim($vtitle);
				$val['totals'][$vtitle]['label'] = $vtitle;
				$val['totals'][$vtitle]['num'] = $totals[$vtitle]['content'] == $vtitle ? $totals[$vtitle]['tnum'] : 0;
				$val['totals'][$vtitle]['rate'] = $val['totals'][$vtitle]['num'] && $sinfo['num'] ? intval($val['totals'][$vtitle]['num']/$sinfo['num']*100) : 0;
			}
		}
		
	}
	include $this->template('answer');
}