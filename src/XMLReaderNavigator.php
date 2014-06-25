<?php
/*
 * This file is part of the XMLReaderIterator package.
 *
 * Copyright (C) 2014 hakre <http://hakre.wordpress.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author hakre <http://hakre.wordpress.com>
 * @license AGPL-3.0 <http://spdx.org/licenses/AGPL-3.0>
 */

/**
 * Class XMLReaderNavigator
 *
 * XMLReader movement
 */
class XMLReaderNavigator implements XMLReaderAggregate
{
    /**
     * @var XMLReader
     */
    private $reader;

    function __construct(XMLReader $reader)
    {
        $this->reader = $reader;
    }

    /**
     * @return XMLReader
     */
    public function getReader()
    {
        return $this->reader;
    }

    /**
     * move to next element node
     *
     * @return bool success
     */
    public function nextElement()
    {
        $reader = $this->reader;

        while (
            $result = $reader->read()
            and $reader->nodeType !== XMLReader::ELEMENT
        );

        return $result;
    }

    /**
     * move to next element node by name
     *
     * @param string $name
     *
     * @return bool success
     */
    public function nextElementByName($name)
    {
        while (
            $result = $this->nextElement()
            and $this->reader->name !== $name
        );

        return $result;
    }

    /**
     * move to next element node by localName
     *
     * @param string $localName
     *
     * @return bool success
     */
    public function nextElementByLocalName($localName)
    {
        while (
            $result = $this->nextElement()
            and $this->reader->localName !== $localName
        );

        return $result;
    }
}
