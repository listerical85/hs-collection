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
        $cards['druid']     = $repo->findByClass('druid',true);
        $cards['hunter']    = $repo->findByClass('hunter',true);
        $cards['mage']      = $repo->findByClass('mage',true);
        $cards['paladin']   = $repo->findByClass('paladin',true);
        $cards['priest']    = $repo->findByClass('priest',true);
        $cards['rogue']     = $repo->findByClass('rogue',true);
        $cards['shaman']    = $repo->findByClass('shaman',true);
        $cards['warlock']   = $repo->findByClass('warlock',true);
        $cards['warrior']   = $repo->findByClass('warrior',true);
        $cards['neutral']   = $repo->findByClass(null,true);

        $cards['golden']    = $repo->findByGolden(true,true);

        $cards['common']    = $repo->findByType('common',true);
        $cards['rare']      = $repo->findByType('rare',true);
        $cards['epic']      = $repo->findByType('epic',true);
        $cards['legendary'] = $repo->findByType('legendary',true);

        $mostOpened         = $repo->findMostOpenedCard();

        $openedPacks        = $repo->findOpenedPacks();

        return array('cards'=>$cards, 'mostOpened'=>$mostOpened,'openedPacks'=>$openedPacks);

    }
}
