<?php

declare(strict_types = 1);

namespace App\Writes;

use Log;
use App\Exceptions\SaveRecordException;
use App\Writes\AlbumWriteInterface;
use App\Album;

class AlbumWrite implements AlbumWriteInterface
{
	/**
     * @var Album
     */
    private $album;

    /**
     * @var array
     */
    private $requestData;


    public function with(Album $album, array $requestData): self
    {
        $this->album = $album;
        $this->requestData = $requestData;

        return $this;
    }

    /**
     * album registers new album via crm
     *
     */
    public function setMain(): void
    {
        try {
            $this->album->name = trim($this->requestData['name']);
            $this->album->artist = trim($this->requestData['artist']);
            $this->album->genre = trim($this->requestData['genre']);
            $this->album->condition = trim($this->requestData['condition']);
            
            $this->album->save();
        }
        catch (\Exception $e) {
            Log::error($e->getMessage() . " " . get_class($this) . " " . __METHOD__ . " " . __LINE__);
            
            throw new SaveRecordException('This record cannot be saved! ' . $e->getMessage()); //400
        }

    }

    /**
     * activate or deactivate the album
     *
     */
    public function setActivation(): void
    {
        try {
            $this->album->is_active = filter_var($this->requestData['is_active'], FILTER_VALIDATE_BOOLEAN);
            $this->album->save();
        }
        catch (\Exception $e) {
            Log::error($e->getMessage() . " " . get_class($this) . " " . __METHOD__ . " " . __LINE__);
            
            throw new SaveRecordException('This record cannot be saved! ' . $e->getMessage()); //400
        }
    }

    /**
     * returns updated album object
     *
     */
    public function getAlbum(): Album
    {
        return $this->album;
    }
}