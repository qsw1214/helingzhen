<?php/* * To change this license header, choose License Headers in Project Properties. * To change this template file, choose Tools | Templates * and open the template in the editor. */global $_GPC;global $_W;$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';$uniacid = $this->_weid;$pindex = max(1, intval($_GPC['page']));$psize = $this->psize;$url = $this->createWebUrl('hotel_member');switch ($op) {    case 'display':        $lists = pdo_fetchall('SELECT * FROM ' . tablename($this->mlevel) . ' WHERE uniacid = ' . $uniacid . ' ORDER BY level DESC LIMIT ' . (($pindex - 1) * $psize) . ',' . $psize);        break;     case 'edit':        $id = $_GPC['id'];        $item = pdo_fetch('SELECT * FROM ' . tablename($this->mlevel) . ' WHERE uniacid = ' . $uniacid . ' and id=' . $id);        if (empty($item)) {            message('会员等级信息不存在!', $url, 'error');        }        if (checksubmit()) {            $data = array(                'uniacid' => $_W['uniacid'],                'level' => $_GPC['level'],                'levelname' => $_GPC['levelname'],                'ordermoney' => $_GPC['ordermoney'],                'ordercount' => $_GPC['ordercount'],                'discount' => $_GPC['discount'],                'enabled' => $_GPC['enabled']            );            $result = pdo_update($this->mlevel, $data, array('id' => $id, 'uniacid' => $this->_weid));            if ($result) {                message('会员等级信息编辑成功!', $url, 'success');            } else {                message('会员等级信息编辑失败!', $url, 'error');            }        }        break;            case 'delete':        $result = pdo_delete($this->mlevel, array('id' => $_GPC['id'], 'uniacid' => $this->_weid));        if ($result) {            message('会员等级信息删除成功!', $url, 'success');        } else {            message('会员等级信息删除失败!', $url, 'error');        }        break;    case 'memberinfo':        load()->model("mc");                  $lists = pdo_fetchall('SELECT uid,mobile,credit1,credit2,credit3,nickname,avatar,createtime FROM ' . tablename($this->members) . ' WHERE uniacid = ' . $uniacid . ' ORDER BY credit1 DESC,credit2 desc,mobile desc LIMIT ' . (($pindex - 1) * $psize) . ',' . $psize);        foreach ($lists as $key=>$value) {            $checkhotels = pdo_fetchall('SELECT * from ' . tablename($this->ycadmin).' where uid='.$value['uid'].' and msg_flag=1');            $lists[$key]['checkhotels'] = $checkhotels;        }        $counts= pdo_fetch('SELECT uid,count(*) as jf FROM ' . tablename($this->members) . ' WHERE uniacid = ' . $uniacid . ' GROUP BY credit1 DESC ');        $total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename($this->members) . ' WHERE uniacid = ' . $uniacid .' and nickname!= \'\'');        $pager = pagination($total, $pindex, $psize);        $levelt=pdo_fetchall('SELECT levelname,ordercount FROM ' . tablename($this->mlevel) . ' WHERE uniacid = ' . $uniacid .' ORDER BY ordercount DESC');        $hotels = pdo_fetchall('SELECT id,title FROM ' . tablename($this->hotel) . 'WHERE  status = 1 and uniacid =' . $this->_weid);        include $this->template('memberinfo');        exit;        break;    case 'memberManagerHotel':        $hotelids = $_GPC['hotelids'];        $data = array(            'msg_flag' => 0,        );        $result = pdo_update($this->ycadmin, $data, array('uid' => $_GPC['uid'],'uniacid' => $this->_weid));        if(!empty($hotelids)){            $hotels = explode(",",$hotelids);            foreach ($hotels as &$ht) {                $data = array(                    'msg_flag' => 1,                    'uniacid' => $this->_weid,                    'uid' => $_GPC['uid'],                    'hotelid' =>$ht                 );                $result =  pdo_insert($this->ycadmin, $data);            }        }        if ($result) {            echo json_encode(array('success'=>1,'msg'=>"修改酒店管理员保存成功!"));exit;        } else {            echo json_encode(array('success'=>2,'msg'=>"修改酒店管理员保存失败!"));exit;        }        /*        $data = array(            'msg_flag' => 1,        );        $result = pdo_update($this->members, $data, array('uid' => $_GPC['id'],'uniacid' => $this->_weid));        if ($result) {            echo json_encode(array('success'=>1,'msg'=>"修改酒店管理员保存成功!"));exit;          //  message('修改酒店管理员保存成功!', '', 'success');        } else {            echo json_encode(array('success'=>2,'msg'=>"修改酒店管理员保存失败!"));exit;          //  message('修改酒店管理员保存失败!', '', 'error');        }*/       // print_r($_GPC);        //echo json_encode(array('success'=>2,'msg'=>"修改酒店管理员保存失败!"));exit;        break;    default:        break;}if (checksubmit()) {    $data = array(        'uniacid' => $_W['uniacid'],        'level' => $_GPC['level'],        'levelname' => $_GPC['levelname'],        'ordermoney' => $_GPC['ordermoney'],        'ordercount' => $_GPC['ordercount'],        'discount' => $_GPC['discount'],        'enabled' => $_GPC['enabled']    );    $le=pdo_fetch('SELECT level FROM ' . tablename($this->mlevel) . ' WHERE uniacid = ' . $uniacid . ' and levelname= \''.$data['levelname'].'\'');    if($le){         message('会员等级信息已存在!', $url, 'error');    }    $result = pdo_insert($this->mlevel, $data);    if ($result) {        message('会员等级信息保存成功!', $url, 'success');    } else {        message('会员等级信息保存失败!', $url, 'error');    }}include $this->template('member_level');