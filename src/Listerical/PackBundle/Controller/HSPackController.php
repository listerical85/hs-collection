<?php

namespace Listerical\PackBundle\Controller;

use Listerical\PackBundle\Entity\HSCard;
use Listerical\PackBundle\Entity\HSCollection;
use Listerical\PackBundle\Entity\HSPack;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class HSPackController extends Controller
{
    /**
     * @Route("/", name="hspack_list")
     * @Template()
     */
    public function listPacksAction()
    {
        return array(// ...
        );
    }

    /**
     * @Route("/detailPack/{pack}", name="hspack_detail")
     * @Template()
     */
    public function detailPackAction(HSPack $pack = null)
    {
        if ($pack)
        {
            return array(
                'pack' => $pack
            );
        } else {
            $pack = $this->getDoctrine()->getRepository('ListericalPackBundle:HSPack')->findOpenPack();
            if ($pack) {
                return $this->redirectToRoute('hspack_detail',array('pack'=>$pack->getId()));
            }
            $pack = new HSPack();
            $pack->setOpenedOn(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($pack);
            $em->flush();

            return $this->redirectToRoute('hspack_detail',array('pack'=>$pack->getId()));
        }
    }

    /**
     * @Route("/savepack", name="save_pack")
     * @Template()
     */
    public function savePackAction(Request $request)
    {
        if($request->request->get('id')){
            $em = $this->getDoctrine()->getManager();

            /** @var HSPack $pack */
            $pack  = $em->getRepository('ListericalPackBundle:HSPack')->find($request->request->get('id'));
            $postdata = $request->request->all();

            if (!$pack) {
                throw $this->createNotFoundException(
                    'Pack not found '.$request->request->get('relatie_code')
                );
            }else{
                $ignoreList = array('id');
                foreach($postdata as $property => $value){
                    if(property_exists($pack,$property)&&!in_array($property,$ignoreList)){
                        $method = sprintf('set%s', ucwords(str_replace('_','',$property)));
                        $pack->$method($value);
                    }
                }
                $pack->setOpenedOn(new \DateTime());
                $pack = $this->addCardToPack($request->get('card1'), $pack, $request->request->has('goldenc1'));
                $pack = $this->addCardToPack($request->get('card2'), $pack, $request->request->has('goldenc2'));
                $pack = $this->addCardToPack($request->get('card3'), $pack, $request->request->has('goldenc3'));
                $pack = $this->addCardToPack($request->get('card4'), $pack, $request->request->has('goldenc4'));
                $pack = $this->addCardToPack($request->get('card5'), $pack, $request->request->has('goldenc5'));


                $em->flush();

                return $this->redirectToRoute('hspack_detail',array('pack'=>0));


            }


        }else{
            //Throw error
        }
    }

    public function addCardToPack($cardname, HSPack $pack, $golden = false) {
        $em = $this->getDoctrine()->getManager();
        $card = $this->getDoctrine()->getRepository('ListericalPackBundle:HSCard')->find($cardname);

        if (!$card) {
            $plaincard = \Unirest\Request::get("https://omgvamp-hearthstone-v1.p.mashape.com/cards/".$cardname,
                array(
                    "X-Mashape-Key" => "Vrba0s0FtdmshgtdUHqlXgg7HSRlp1bROeNjsn3zaudcxA4MYm",
                    "Accept" => "application/json"
                )
            );
            $plaincard = $plaincard->body[0];
            $postdata = get_object_vars($plaincard);
            $card = new HSCard();

            $ignoreList = array();
            foreach($postdata as $property => $value){
                if(property_exists($card,$property)&&!in_array($property,$ignoreList)){
                    $method = sprintf('set%s', ucwords(str_replace('_','',$property)));
                    $card->$method($value);
                }
            }

            $em->persist($card);
            $em->flush();
            $em->refresh($card);
        }
        $collection = new HSCollection();
        $collection->setPack($pack);
        $collection->setCard($card);
        if ($golden) {
            $collection->setGolden(true);
        } else {
            $collection->setGolden(false);
        }

        $em->persist($collection);
        $em->flush($collection);

        $pack->addCard($card);
        return $pack;
    }
}
