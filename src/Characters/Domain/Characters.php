<?php

declare(strict_types=1);


namespace App\Characters\Domain;


use CharactersGenderVO;
use CharactersHeightVO;
use CharactersIdVO;
use CharactersMassVO;
use CharactersNameVO;
use CharactersPictureVO;
use SharedCratedAtVO;
use SharedUpdatedAtVO;

final class Characters
{
    public function __construct(
        private CharactersIdVO      $id,
        private CharactersNameVO    $name,
        private CharactersMassVO    $mass,
        private CharactersHeightVO  $height,
        private CharactersGenderVO  $gender,
        private CharactersPictureVO $picture,
        private SharedCratedAtVO    $create_at,
        private SharedUpdatedAtVO   $update_at
    )
    {
    }

    /**
     * @return CharactersIdVO
     */
    public function getId(): CharactersIdVO
    {
        return $this->id;
    }

    /**
     * @return CharactersNameVO
     */
    public function getName(): CharactersNameVO
    {
        return $this->name;
    }

    /**
     * @return CharactersMassVO
     */
    public function getMass(): CharactersMassVO
    {
        return $this->mass;
    }

    /**
     * @return CharactersHeightVO
     */
    public function getHeight(): CharactersHeightVO
    {
        return $this->height;
    }

    /**
     * @return CharactersGenderVO
     */
    public function getGender(): CharactersGenderVO
    {
        return $this->gender;
    }

    /**
     * @return CharactersPictureVO
     */
    public function getPicture(): CharactersPictureVO
    {
        return $this->picture;
    }

    /**
     * @return SharedCratedAtVO
     */
    public function getCreateAt(): SharedCratedAtVO
    {
        return $this->create_at;
    }

    /**
     * @return SharedUpdatedAtVO
     */
    public function getUpdateAt(): SharedUpdatedAtVO
    {
        return $this->update_at;
    }


    public static function create(
        CharactersNameVO    $name_vo,
        CharactersMassVO    $mass_vo,
        CharactersHeightVO  $height_vo,
        CharactersGenderVO  $gender_vo,
        CharactersPictureVO $picture_vo,
    ): self
    {
        return new self(
            new CharactersIdVO(null),
            $name_vo,
            $mass_vo,
            $height_vo,
            $gender_vo,
            $picture_vo,
            new SharedCratedAtVO(date('now')),
            new SharedUpdatedAtVO(null),
        );
    }

    public function update(
        CharactersIdVO      $id_vo,
        CharactersNameVO    $name_vo,
        CharactersMassVO    $mass_vo,
        CharactersHeightVO  $height_vo,
        CharactersGenderVO  $gender_vo,
        CharactersPictureVO $picture_vo,
        SharedCratedAtVO    $created_at_vo,
        SharedUpdatedAtVO   $updated_at_vo,
    )
    {

    }
}