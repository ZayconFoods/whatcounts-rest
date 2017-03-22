<?php
    /**
     * Created by PhpStorm.
     * User: Mark Simonds
     * Date: 4/19/16
     * Time: 2:44 PM
     */

    namespace Zaycon\Whatcounts_Rest\Traits;

    use GuzzleHttp\Exception,
        Zaycon\Whatcounts_Rest\Models,
        Zaycon\Whatcounts_Rest\WhatCountsException;


    /**
     * Class Traits\ActionsTraits
     * @package Whatcounts_Rest
     */
    trait Actions
    {
        /**
         * @param $stub
         * @param $class_name
         * @param bool $retry
         * @param bool $do_async
         *
         * @return array
         *
         * @throws \Zaycon\Whatcounts_Rest\WhatCountsException
         */
        public function getAll($stub, $class_name, $retry = FALSE, $do_async = FALSE)
        {
            try
            {
                /** @var \Zaycon\Whatcounts_Rest\WhatCounts $this */
                $response_data = $this->call($stub, 'GET', $retry, $do_async);
            }
            catch (WhatCountsException $e)
            {
                throw $e;
            }

            if (is_array($response_data))
            {
                $objects = array();
                foreach ($response_data as $item)
                {
                    $object = $this->generateObject($class_name, $item);
                    $objects[] = $object;
                }

                return $objects;
            } else
            {
                if (is_object($response_data))
                {
                    $object = $this->generateObject($class_name, $response_data);
                    return $object;
                }
            }
        }

        /**
         * @param $stub
         * @param $class_name
         * @param $id
         * @param bool $retry
         * @param bool $do_async
         *
         * @return mixed
         *
         * @throws \Zaycon\Whatcounts_Rest\WhatCountsException
         */
        public function getById($stub, $class_name, $id, $retry = FALSE, $do_async = FALSE)
        {
            try
            {
                if ($do_async)
                {
                    return $this->call($stub . '/' . $id, 'GET', NULL, $retry, $do_async);
                }
                else
                {
                    $response_data = $this->call($stub . '/' . $id, 'GET', $retry, $do_async);
                    $object = $this->generateObject($class_name, $response_data);
                    return $object;
                }
            }
            catch (WhatCountsException $e)
            {
                throw $e;
            }

        }

        /**
         * @param $stub
         * @param $class_name
         * @param $name
         * @param bool $retry
         * @param bool $do_async
         *
         * @return array
         *
         * @throws \Zaycon\Whatcounts_Rest\WhatCountsException
         */
        public function getByName($stub, $class_name, $name, $retry = FALSE, $do_async = FALSE)
        {
            try
            {
                $response_data = $this->call($stub . '?name=' . $name, 'GET', $retry, $do_async);
            }
            catch (WhatCountsException $e)
            {
                throw $e;
            }

            if (is_array($response_data))
            {
                $objects = array();

                foreach ($response_data as $item)
                {
                    $object = new $class_name($item, new \DateTimeZone($this->getTimeZone()));
                    $objects[] = $object;
                }
            } else
            {
                $objects = new $class_name($response_data, new \DateTimeZone($this->getTimeZone()));
            }

            return $objects;
        }

        /**
         * @param $stub
         * @param $object
         * @param bool $retry
         * @param bool $do_async
         *
         * @return bool|object
         *
         * @throws \Zaycon\Whatcounts_Rest\WhatCountsException
         */
        public function create($stub, $object, $retry = TRUE, $do_async = FALSE)
        {
            /** @var \Zaycon\Whatcounts_Rest\WhatCounts $this */
            /** @var Models\Article|Models\Campaign|Models\MailingList|Models\Subscriber|Models\Subscription|Models\Template|Models\RelationalData $object */
            if (is_a($object, 'stdClass'))
            {
                $request_data = $this->objectToArray($object);
            } else
            {
                $request_data = $object->getRequestArray();
            }

            try
            {
                return $this->call($stub . '/', 'POST', $request_data, $retry, $do_async);
            }
            catch (WhatCountsException $e)
            {
                throw $e;
            }
        }

        /**
         * @param $stub
         * @param $object
         * @param string $method
         * @param bool $retry
         * @param bool $do_async
         *
         * @return bool|object
         *
         * @throws \Zaycon\Whatcounts_Rest\WhatCountsException
         */
        public function update($stub, $object, $method = 'PUT', $retry = TRUE, $do_async = FALSE)
        {
            /** @var \Zaycon\Whatcounts_Rest\WhatCounts $this */
            /** @var Models\Article|Models\Campaign|Models\MailingList|Models\Subscriber|Models\Subscription|Models\Template|Models\RelationalData $object */
            if (is_a($object, 'stdClass'))
            {
                $request_data = $object;
                $id = '';
            } else
            {
                $request_data = $object->getRequestArray();
                $id = $object->getId();
            }

            try
            {
                return $this->call($stub . '/' . $id, $method, $request_data, $retry, $do_async);
            }
            catch (WhatCountsException $e)
            {
                throw $e;
            }
        }

        /**
         * @param $stub
         * @param $object
         * @param bool $retry
         * @param bool $do_async
         *
         * @return bool
         *
         * @throws \Zaycon\Whatcounts_Rest\WhatCountsException
         */
        public function delete($stub, $object, $retry = FALSE, $do_async = FALSE)
        {
            /** @var \Zaycon\Whatcounts_Rest\WhatCounts $this */
            /** @var Models\Article|Models\Campaign|Models\MailingList|Models\Subscriber|Models\Subscription|Models\Template|Models\RelationalData $object */

            if (is_a($object, 'stdClass'))
            {
                $request_data = $object;
                $id = '';
            } else
            {
                $request_data = $object->getRequestArray();
                $id = $object->getId();
            }

            try
            {
                $this->call($stub . '/' . $id, 'DELETE', $request_data, $retry, $do_async);
            }
            catch (WhatCountsException $e)
            {
                throw $e;
            }

            return TRUE;
        }

        /**
         * @param $stub
         * @param $object
         * @param bool $retry
         * @param bool $do_async
         *
         * @return bool
         *
         * @throws \Zaycon\Whatcounts_Rest\WhatCountsException
         */
        public function deleteById($stub, $object, $retry = FALSE, $do_async = FALSE)
        {
            /** @var \Zaycon\Whatcounts_Rest\WhatCounts $this */
            /** @var Models\Article|Models\Campaign|Models\MailingList|Models\Subscriber|Models\Subscription|Models\Template $object */
            if (!is_a($object, 'stdClass'))
            {
                $id = intval($object);
            } else
            {
                $id = $object->getId();
            }

            try
            {
                $this->call($stub . '/' . $id, 'DELETE', $retry, $do_async);
            }
            catch (WhatCountsException $e)
            {
                throw $e;
            }

            return TRUE;
        }

        /**
         * @param $stub
         * @param $object
         * @param bool $retry
         * @param bool $do_async
         *
         * @return bool
         *
         * @throws \Zaycon\Whatcounts_Rest\WhatCountsException
         */
        public function deleteByCustomerKey($stub, $object, $retry = FALSE, $do_async = FALSE)
        {
            /** @var \Zaycon\Whatcounts_Rest\WhatCounts $this */
            /** @var Models\Article|Models\Campaign|Models\MailingList|Models\Subscriber|Models\Subscription|Models\Template $object */
            $id = $object->getCustomerKey();

            try
            {
                $this->call($stub . '/' . $id, 'DELETE', $retry, $do_async);
            }
            catch (WhatCountsException $e)
            {
                throw $e;
            }

            return TRUE;

        }

        private function objectToArray($object) {
            if (is_object($object)) {
                return array_map(array(__CLASS__, __FUNCTION__), get_object_vars($object));
            } else if (is_array($object)) {
                return array_map(array(__CLASS__, __FUNCTION__), $object);
            } else {
                return $object;
            }
        }

    }