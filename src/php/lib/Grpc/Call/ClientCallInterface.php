<?php
/*
 *
 * Copyright 2024 gRPC authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */

namespace Grpc\Call;

use Closure;

/**
 * An interface to interact with client related calls for grpc.
 */
interface ClientCallInterface
{
    /**
     * @return bool Indicate the client is ready to send messages to remote server.
     */
    public function isClientReady(): bool;

    /**
     * A callback method which will be called when the client is ready to write messages.
     *
     * @param Closure $onReady
     * @return void
     */
    public function onClientReady(Closure $onReady): void;

    /**
     * Write a single message to the remote server. User must not call the method before
     * the client is ready to write messages. Use {@see ClientCallInterface::onClientReady()} or
     * {@see ClientCallInterface::isClientReady()} to check if the client is ready to write messages.
     *
     * @param mixed $data The grpc object to be written to the remote server
     * @param array $options An array of options, possible keys: 'flags' => a number (optional)
     * @param Closure|null $onComplete A callback method that calls when the call is complete.
     */
    public function onClientNext($data, array $options = [], ?Closure $onComplete = null): void;

    /**
     * A callback method to indicate that no more writes can be sent by the client, however the server
     * may send any messages or stream of messages once their end is closed.
     *
     * @param Closure $onComplete
     * @return void
     */
    public function onClientCompleted(Closure $onComplete): void;
}