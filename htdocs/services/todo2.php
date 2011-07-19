<?php

\Foomo\Services\RPC::serveClass(new \Foomo\Examples\Todo\Service2(), new \Foomo\Services\RPC\Serializer\AMF(), 'org.foomo.examples.services.todo');