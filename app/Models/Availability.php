class Availability extends Model
{
    protected $fillable = ['user_id', 'day_of_week', 'start_time', 'end_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}