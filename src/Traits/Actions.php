<?php
    /**
     * Created by PhpStorm.
     * User: Mark Simonds
     * Date: 4/19/16
     * Time: 2:44 PM
     */

    namespace Zaycon\Whatcounts_Rest\Traits;

    use GuzzleHttp\Exception;
    use Zaycon\Whatcounts_Rest\Models;

    /**
     * Class Traits\ActionsTraits
     * @package Whatcounts_Rest
     */
    trait Actions
    {
        /**
         * @param $stub
         * @param $class_name
         *
         * @return array
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function getAll($stub, $class_name)
        {
            try
            {
                /** @var \Zaycon\Whatcounts_Rest\WhatCounts $this */
                $response_data = $this->call($stub, 'GET');
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
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

                return $objects;
            } else
            {
                if (is_object($response_data))
                {
                    $object = new $class_name($response_data, new \DateTimeZone($this->getTimeZone()));

                    return $object;
                }
            }
        }

        /**
         * @param $stub
         * @param $class_name
         * @param $id
         *
         * @return mixed
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function getById($stub, $class_name, $id)
        {
            try
            {
                $response_data = $this->call($stub . '/' . $id, 'GET');
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
            {
                throw $e;
            }

            $object = new $class_name($response_data, new \DateTimeZone($this->getTimeZone()));

            return $object;
        }

        /**
         * @param $stub
         * @param $class_name
         * @param $name
         *
         * @return array
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function getByName($stub, $class_name, $name)
        {
            try
            {
                $response_data = $this->call($stub . '?name=' . $name, 'GET');
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
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
         *
         * @return bool|object
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function create($stub, $object, $retry = TRUE)
        {
            /** @var \Zaycon\Whatcounts_Rest\WhatCounts $this */
            /** @var Models\Article|Models\Campaign|Models\MailingList|Models\Subscriber|Models\Subscription|Models\Template|Models\RelationalData $object */
            if (is_a($object, 'stdClass'))
            {
                $request_data = $object;
            } else
            {
                $request_data = $object->getRequestArray();
            }

            try
            {
                $response_data = $this->call($stub . '/', 'POST', $request_data, $retry);
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
            {
                throw $e;
            }

            return $response_data;
        }

        /**
         * @param $stub
         * @param $object
         * @param string $method
         * @param bool $retry
         *
         * @return bool|object
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function update($stub, $object, $method = 'PUT', $retry = TRUE)
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
                $response_data = $this->call($stub . '/' . $id, $method, $request_data, $retry);
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
            {
                throw $e;
            }

            return $response_data;
        }

        /**
         * @param $stub
         * @param $object
         *
         * @return bool
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function delete($stub, $object)
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
                $this->call($stub . '/' . $id, 'DELETE', $request_data);
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
            {
                throw $e;
            }

            return TRUE;
        }

        /**
         * @param $stub
         * @param $object
         *
         * @return bool
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function deleteById($stub, $object)
        {
            /** @var \Zaycon\Whatcounts_Rest\WhatCounts $this */
            /** @var Models\Article|Models\Campaign|Models\MailingList|Models\Subscriber|Models\Subscription|Models\Template $object */
            if (is_int($object))
            {
                $id = $object;
            } else
            {
                $id = $object->getId();
            }

            try
            {
                $this->call($stub . '/' . $id, 'DELETE');
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
            {
                throw $e;
            }

            return TRUE;
        }

        /**
         * @param $stub
         * @param $object
         *
         * @return bool
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function deleteByCustomerKey($stub, $object)
        {
            /** @var \Zaycon\Whatcounts_Rest\WhatCounts $this */
            /** @var Models\Article|Models\Campaign|Models\MailingList|Models\Subscriber|Models\Subscription|Models\Template $object */
            $id = $object->getCustomerKey();

            try
            {
                $this->call($stub . '/' . $id, 'DELETE');
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
            {
                throw $e;
            }

            return TRUE;

        }

    }