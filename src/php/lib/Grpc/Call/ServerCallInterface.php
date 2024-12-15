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

interface ServerCallInterface
{
    /**
     * @return bool Indicate the server is ready to send messages to the client.
     */
    public function isServerReady(): bool;

    /**
     * Method that will be called when a message is sent by the remote server.
     * The method implementation varies with other call method.
     *
     * @param Closure $onMessage The stream of messages.
     */
    public function onStreamNext(Closure $onMessage): void;

    /**
     * A callback method to indicate that no more writes can be sent by the server and the client.
     * The client may not send any messages after the stream completes.
     *
     * @param Closure $onCompleted
     * @return void
     */
    public function onStreamCompleted(Closure $onCompleted): void;
}