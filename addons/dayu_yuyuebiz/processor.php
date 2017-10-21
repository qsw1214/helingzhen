<?php

/**
 * 微预约
 *
 * @author dayu
 * @url QQ18898859
 */
defined('IN_IA') or exit('Access Denied');

class dayu_yuyuebizModuleProcessor extends WeModuleProcessor {

    public function respond() {
        global $_W;
        $rid = $this->rule;
        if ($rid) {
            $reply = pdo_fetch("SELECT * FROM " . tablename('dayu_yuyuebiz_reply') . " WHERE rid = :rid", array(':rid' => $rid));
            if ($reply) {
                $sql = 'SELECT * FROM ' . tablename('dayu_yuyuebiz') . ' WHERE `weid`=:weid AND `reid`=:reid';
                $activity = pdo_fetch($sql, array(':weid' => $_W['uniacid'], ':reid' => $reply['reid']));				
				$link = $activity['is_time']==2 ? $this->createMobileUrl('timelist',array('id' => $activity['reid'], 'weid' => $_W['uniacid'])) : $this->createMobileUrl('dayu_yuyuebiz',array('id' => $activity['reid'], 'weid' => $_W['uniacid']));
                $news = array();
                $news[] = array(
                    'title' => $activity['title'],
                    'description' => strip_tags($activity['description']),
                    'picurl' => tomedia($activity['thumb']),
//					'url' => $this->createMobileUrl('dayu_yuyuebiz',array('id' => $activity['reid'], 'weid' => $_W['uniacid']))
                    'url' => $link
                );
                return $this->respNews($news);
            }
        }
        return null;
    }

}
