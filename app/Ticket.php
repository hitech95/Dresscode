<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'priority', 'status_id', 'customer_id', 'category_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'completed_at'
    ];

    /**
     * Check if ticket have replays
     *
     * @return bool
     */
    public function hasReplays()
    {
        return (bool)count($this->messages) > 1;
    }

    /**
     * Check if ticket has been completed
     *
     * @return bool
     */
    public function isComplete()
    {
        return (bool)$this->completed_at;
    }

    /**
     * Mark ticket as completed
     *
     * @return bool
     */
    public function complete()
    {
        $this->status_id = TicketStatus::close()->firstOrFail()->id;
        $this->completed_at = Carbon::now();
        return $this->save();
    }

    /**
     * List of completed tickets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeComplete($query)
    {
        return $query->whereNotNull('completed_at');
    }

    /**
     * List of active tickets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->whereNull('completed_at');
    }

    /**
     * Get all user tickets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param integer $id
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserTickets($query, $id)
    {
        return $query->where('customer_id', $id);
    }

    /**
     * Get all agent tickets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param integer $id
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAgentTickets($query, $id)
    {
        return $query->where('employee_id', $id);
    }

    /**
     * Get Ticket status.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\TicketStatus', 'status_id');
    }

    /**
     * Get Ticket category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\TicketCategory', 'category_id');
    }

    /**
     * Get Ticket owner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * Get Ticket agent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    /**
     * Get Ticket messages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\TicketMessage');
    }

    /**
     * Get Ticket messages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attachments()
    {
        return $this->belongsToMany('App\Media', 'ticket_attachment');
    }
}
