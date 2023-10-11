<?php


namespace App\EventListener;


use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTExpiredEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTInvalidEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTNotFoundEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;

class AuthentificationListener
{

    public function onAuthenticationFailureResponse(AuthenticationFailureEvent $event)
    {
        /** @var JWTAuthenticationFailureResponse $response */
        $response = $event->getResponse();

        $response->setMessage('error.user.invalid_credentials');
    }

    public function onJWTInvalid(JWTInvalidEvent $event)
    {
        /** @var JWTAuthenticationFailureResponse $response */
        $response = $event->getResponse();

        $response->setMessage('error.token.invalid');
    }

    public function onJWTNotFound(JWTNotFoundEvent $event)
    {
        /** @var JWTAuthenticationFailureResponse $response */
        $response = $event->getResponse();

        $response->setMessage('error.token.not_found');
    }

    public function onJWTExpired(JWTExpiredEvent $event)
    {
        /** @var JWTAuthenticationFailureResponse $response */
        $response = $event->getResponse();

        $response->setMessage('error.token.expired');
    }

}