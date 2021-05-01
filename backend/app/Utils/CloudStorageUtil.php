<?php

namespace App\Utils;

use Google\Cloud\Storage\StorageClient;

class CloudStorageUtil
{
    /**
     * バケット名
     */
    private $bucketName = '';

    /**
     * construct
     */
    public function __construct(array $params = [])
    {
        $this->client = new StorageClient();
        $this->bucketName = env('CLOUD_STORAGE_BUCKET');
    }

    /**
     * upload
     *
     * @return bool
     */
    public function upload(object $updateData = null)
    {
        $bucket = $this->client->bucket($this->bucketName);
        $bucket->upload($updateData);
    }

    /**
     * download
     *
     * @return bool
     */
    public function download(string $fileName = '')
    {
        $bucket = $this->client->bucket($this->bucketName);
        $object = $bucket->object($fileName);
    }

    /**
     * download
     *
     * @return bool
     */
    public function delete(string $fileName = '')
    {
        $bucket = $this->client->bucket($this->bucketName);
        $object = $bucket->object($fileName);
        try {
            $object->delete();
        } catch (\Exception $e) {
            \Log::info($e);
        }
    }
}