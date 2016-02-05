<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model class for user's settings
 *
 * @property int $id
 * @property int $user_id
 * @property int $donotnotifymessage
 * @property int $disablemessages
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */

class Settings extends Model
{

}
