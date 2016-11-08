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
         * @param bool $do_async
         *
         * @return array
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function getAll($stub, $class_name, $do_async = FALSE)
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
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function getById($stub, $class_name, $id, $retry = FALSE, $do_async = FALSE)
        {
            try
            {
                if ($do_async)
                {
                    return $this->call($stub . '/' . $id, 'GET', $retry, $do_async);
                }
                else
                {
                    $response_data = $this->call($stub . '/' . $id, 'GET');
                    $object = $this->generateObject($class_name, $response_data);
                    return $object;
                }
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
            {
                throw $e;
            }

        }

        /**
         * @param $stub
         * @param $class_name
         * @param $name
         * @param bool $do_async
         *
         * @return array
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function getByName($stub, $class_name, $name, $do_async = FALSE)
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
         * @param bool $do_async
         *
         * @return bool|object
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function create($stub, $object, $retry = TRUE, $do_async = FALSE)
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
                return $this->call($stub . '/', 'POST', $request_data, $retry, $do_async);
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
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
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
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
                if ($do_async)
                {
                    return $this->call($stub . '/' . $id, $method, $request_data, $retry, $do_async);
                }
                else
                {
                    $response_data = $this->call($stub . '/' . $id, $method, $request_data, $retry);
                    return $response_data;
                }
            }
            catch (Exception\ServerException $e)
            {
                throw $e;
            }
            catch (Exception\RequestException $e)
            {
                throw $e;
            }
        }

        /**
         * @param $stub
         * @param $object
         * @param bool $do_async
         *
         * @return bool
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function delete($stub, $object, $do_async = FALSE)
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
         * @param bool $do_async
         *
         * @return bool
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function deleteById($stub, $object, $do_async = FALSE)
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
         * @param bool $do_async
         *
         * @return bool
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function deleteByCustomerKey($stub, $object, $do_async = FALSE)
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