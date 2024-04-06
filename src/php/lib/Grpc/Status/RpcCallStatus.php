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

namespace Grpc\Status;

class RpcCallStatus
{
    /** @var int */
    private $code;
    /** @var string */
    private $code_parsed;
    /** @var string */
    private $details;

    public function __construct(int $code, string $codeParsed, string $details)
    {
        $this->code = $code;
        $this->code_parsed = $codeParsed;
        $this->details = $details;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getCodeParsed(): string
    {
        return $this->code_parsed;
    }

    /**
     * @return string
     */
    public function getDetails(): string
    {
        return $this->details;
    }
}