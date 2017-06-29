<?php
namespace FCJoin;

use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use RVIP\RVIP;
use pocketmine\level\sound\PopSound;
use pocketmine\level\Level;


class Main extends PluginBase implements Listener
{
	public function onEnable()
	{
		
		
			$this->getServer()->getPluginManager()->registerEvents($this,$this);
		
		
			$this->getLogger()->info("\n§b=给小学生的一封信=\n§c本插件完全免费,倒卖必究\n§c版权请勿随意乱改\n§b=========");
	  
	  
	  $this->getServer()->getLogger()->info("\n§6==MG雪飞插件==\n§b进服显示插件已成功运行\nPHP版本为: §e".(PHP_VERSION)."§a\n§b运行在:§e".(PHP_OS)."§a系统上.");
 
   $this->vip=RVIP::$RVIP;
	
	}
	
	public function onDisable()
	{

			$this->getServer()->getLogger()->info("§e进服显示插件关闭…感谢使用");

	}
	public function onJ(PlayerJoinEvent $e)
	{
		
		foreach ($this->getServer()->getOnlinePlayers() as $pl) {
	
	$p=$e->getPlayer();

	$n=$p->getName();

/*获取VIP天数以便判断*/
		$ts=$this->vip->Day("get",$n);

/*随机事件*/
$sj=mt_rand(1,9);
$sj2=mt_rand(1,9);
$sj3=mt_rand(1,9);
$sj4=mt_rand(1,9);

		
		if($ts<0.9){ 
	$p->sendMessage("§d-------------------\n§e欢迎您加入幻星梦,当前状态很好哦~\n§6官网:www.funmc.cc,§b见熊§c举报§b带截图有丰富奖励呢~\n§d-------------------");
		
		$pl->sendTip("§b欢迎萌萌哒的§6".$n."§b进入游戏");
		}
		else{
    
	$this->getServer()->broadcastMessage("      §e====§".$sj."尊§".$sj2."贵§".$sj3."显§".$sj4."示§e====\n    §d欢§e迎§cVIP§6玩§b家§a进§7入§e游§6戏!\n  §e他§a是§b我§c们§6的:§e".$n);
	
		$pl->sendTip("    §d=====§6尊§7贵§d的§cVIP§2玩§e家§d=====\n§b酷§".$sj."酷§".$sj2."哒§".$sj3."的§6>§e".$n."§6<§b进§a入§c游§e戏");
		}
	}
	
	 return;
	}
	 public function onQuir(PlayerQuitEvent $e)
	 {
	 
	 	$p=$e->getPlayer();
	$n=$e->getPlayer()->getName();
	
	
	 return;

	 }
	
		}
