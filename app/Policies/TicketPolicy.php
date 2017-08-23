<?php

namespace App\Policies;

use App\Customer;
use App\Ticket;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can see the ticket.
     *
     * @param  \App\Customer  $customer
     * @param  \App\Ticket  $ticket
     * @return mixed
     */
    public function show(Customer $customer, Ticket $ticket)
    {
        return $customer->id == $ticket->customer_id;
    }

    /**
     * Determine whether the user can create addresses.
     *
     * @param  \App\Customer  $customer
     * @return mixed
     */
    public function create(Customer $customer)
    {
        return true;
    }

    /**
     * Determine whether the user can update the ticket.
     *
     * @param  \App\Customer  $customer
     * @param  \App\Ticket  $ticket
     * @return mixed
     */
    public function update(Customer $customer, Ticket $ticket)
    {
        return $customer->id == $ticket->customer_id && !$ticket->isComplete();
    }

    /**
     * Determine whether the user can reply to the ticket.
     *
     * @param  \App\Customer  $customer
     * @param  \App\Ticket  $ticket
     * @return mixed
     */
    public function reply(Customer $customer, Ticket $ticket)
    {
        return $this->update($customer, $ticket);
    }

    /**
     * Determine whether the user can reopen the ticket.
     *
     * @param  \App\Customer  $customer
     * @param  \App\Ticket  $ticket
     * @return mixed
     */
    public function reopen(Customer $customer, Ticket $ticket)
    {
        return false; // TODO - Add locking feature to tickets
    }

    /**
     * Determine whether the user can close the ticket.
     *
     * @param  \App\Customer  $customer
     * @param  \App\Ticket  $ticket
     * @return mixed
     */
    public function close(Customer $customer, Ticket $ticket)
    {
        return $customer->id == $ticket->customer_id; // TODO - Add locking feature to tickets
    }
}
