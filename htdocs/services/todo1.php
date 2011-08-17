<?php

\Foomo\Services\RPC::create(\Foomo\Examples\Todo\Service1())
	->serializeWith(new \Foomo\Services\RPC\Serializer\AMF())
	->clientNamespace('org.foomo.examples.services.todo')
	->run()
;