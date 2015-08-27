<?php
namespace Listerical\PackBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HSCollectionController extends Controller
{
    /**
     * @Route(name="statistics", path="/statistics")
     * @Template()
     */
    public function statisticsAction()
    {
        $repo = $this->getDoctrine()->getRepository('ListericalPackBundle:HSCollection');
        $user = $this->getUser();
        $cards['druid']     = $repo->findByClass($user,'druid',true);
        $cards['hunter']    = $repo->findByClass($user,'hunter',true);
        $cards['mage']      = $repo->findByClass($user,'mage',true);
        $cards['paladin']   = $repo->findByClass($user,'paladin',true);
        $cards['priest']    = $repo->findByClass($user,'priest',true);
        $cards['rogue']     = $repo->findByClass($user,'rogue',true);
        $cards['shaman']    = $repo->findByClass($user,'shaman',true);
        $cards['warlock']   = $repo->findByClass($user,'warlock',true);
        $cards['warrior']   = $repo->findByClass($user,'warrior',true);
        $cards['neutral']   = $repo->findByClass($user,null,true);

        $cards['golden']    = $repo->findByGolden($user,true,true);

        $cards['common']    = $repo->findByType($user,'common',true);
        $cards['rare']      = $repo->findByType($user,'rare',true);
        $cards['epic']      = $repo->findByType($user,'epic',true);
        $cards['legendary'] = $repo->findByType($user,'legendary',true);

        $mostOpened         = $repo->findMostOpenedCard($user);

        $openedPacks        = $repo->findOpenedPacks($user);
        if($openedPacks !== null)$openedPacks = $openedPacks[1];

        return array('cards'=>$cards, 'mostOpened'=>$mostOpened,'openedPacks'=>$openedPacks);

    }
}
