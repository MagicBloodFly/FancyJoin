<?php
//<?php是每个php文件都需要的开头
namespace FENGberd\MyFirstPlugin;//命名空间，和文件路径要一样

//下面这几个use是插件必须要的
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use RVIP\RVIP;
use pocketmine\level\sound\PopSound;
use pocketmine\level\sound\FizzSound;
use pocketmine\Event;



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

	$ts = $this->vip->Day("get",$p->getName());
		
	
if($ts>0)
{
		$this->getServer()->broadcastMessage("§d欢§e迎§cVIP§6玩§b家§a进§7入§e游§6戏!");
	
		$pl->sendTip("§d==§6尊贵的§cVIP§6玩家§d==\n§b酷酷哒的§6".$n."§b进入游戏");
		
		                         $pl->getLevel()->addSound(new PopSound($p));

	
}
	
		if($p->isOp()){
   
   
   	$p->sendMessage("§d-------------------\n§e欢迎您幻星梦高层管理员\n§b您是OP,请尽力帮助需要帮助的人\n§d-------------------");
		
		$pl->sendTip("§d====§6欢迎高层组的§6管理员§d====\n§b一个路边扫地的§6".$n."§b进入游戏\n§e====§6有问题可以找他哦~§e====");
		 
		}
		else
		{
	

		}
	}
	
	 return;
	}
	
	 public function onQ(PlayerQuitEvent $e)
	 {
	 
	 	$p=$e->getPlayer();
	$n=$e->getPlayer()->getName();
	
	
	 return;

	 }
	
	/**
* 封装rvip查询函数
*
* @param string $Player 查询的玩家名
* @param boolean $boolean 返回布林值还是返回vip等级
* @return string 当参数$boolean为false时。
* @return boolean 当参数$boolean为true时。
*
*/
public function isVip($Player,$boolean = true){
   if(!empty($Player)) return false;
   $rvip = RVIP::$RVIP;
   $res = $rvip->VIP("get",$Player);
   $vaildvip = array(1,2,3);
   if($boolean===false) return $res;
   if(in_array($res,$vaildvip)){
       return true;
   } else {
       return false;
   }
}
	}
