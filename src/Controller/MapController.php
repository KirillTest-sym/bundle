<?php

namespace Limur\Map\Controller;

use App\Limur\Map\Service\MapInterface;
use App\Limur\Map\Entity\Address;
use App\Limur\Map\Form\AddressType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class MapController extends AbstractController
{
    private $map;

    public function __construct(MapInterface $map)
    {
        $this->map = $map;
    }

    public function geoAction(Request $request): JsonResponse
    {
        $address = new Address();

        $form = $this->createForm(AddressType::class, $address);

        $data = $request->request->all();

        $form->submit($data);

        $res = ($form->isValid()) ? $this->map->getGeoData($form->getData()->toArray()) : ['error' => $form->getErrors()];

        return $this->json(json_encode($res));
    }
}