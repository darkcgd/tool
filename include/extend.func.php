<?php
function litimgurls($imgid=0)
{
    global $lit_imglist,$dsql;
    //获取附加表
    $row = $dsql->GetOne("SELECT c.addtable FROM #@__archives AS a LEFT JOIN #@__channeltype AS c 
                                                            ON a.channel=c.id where a.id='$imgid'");
    $addtable = trim($row['addtable']);
    
    //获取图片附加表imgurls字段内容进行处理
    $row = $dsql->GetOne("Select imgurls From `$addtable` where aid='$imgid'");
    
    //调用inc_channel_unit.php中ChannelUnit类
    $ChannelUnit = new ChannelUnit(2,$imgid);
    
    //调用ChannelUnit类中GetlitImgLinks方法处理缩略图
    $lit_imglist = $ChannelUnit->GetlitImgLinks($row['imgurls']);
    
    //返回结果
    return $lit_imglist;
}

/**
* 获取一个类目的顶级栏目
* @param string $tid 栏目ID
* @return string
*/
if ( ! function_exists('gettoptype'))
{
function gettoptype($tid,$action)
{
global $dsql,$cfg_Cs;
if(!is_array($cfg_Cs))
{
require_once(DEDEDATA."/cache/inc_catalog_base.inc");
}
if(!isset($cfg_Cs[$tid][0]) || $cfg_Cs[$tid][0]==0)
{
$topid = $tid;
}
else
{
$topid = GetTopid($cfg_Cs[$tid][0]);
}
$row = $dsql->GetOne("SELECT * FROM `#@__arctype` WHERE id=$topid");
$toptypename = $row['typename'];
$toptypeurl = $topid;
if($action=='id') return $topid;
if($action=='name') return $toptypename;
if($action=='link') return GetOneTypeUrlA($row);
}
}