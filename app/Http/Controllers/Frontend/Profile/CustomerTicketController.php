<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Http\Controllers\Controller;
use App\Ticket;
use App\TicketCategory;
use App\TicketMessage;
use App\TicketStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerTicketController extends Controller
{
    /**
     * Show the application's customer dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Auth::guard('frontend')->user();
        $tickets = Ticket::userTickets($customer->id)->with('status')->get();

        return view('customer.tickets', compact('customer', 'tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO - Hardcoded
        $priorities = array(
            0 => 'Low',
            1 => 'Medium',
            2 => 'Hi',
        );

        $categories = TicketCategory::all()->mapWithKeys(function ($item) {
            return [$item['slug'] => $item['name']];
        });;

        return view('customer.ticket_create', compact('priorities', 'categories'));
    }

    /**
     * Show the application's customer dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Auth::guard('frontend')->user();

        $data = $request->all();
        $this->validator($data)->validate();

        $status = TicketStatus::default()->firstOrFail();
        $category = TicketCategory::where('slug', $data['category'])->firstOrFail();

        $ticket = Ticket::create([
            'subject' => $data['subject'],
            'priority' => $data['priority'],
            'status_id' => $status->id,
            'category_id' => $category->id,
            'customer_id' => $customer->id,
        ]);

        TicketMessage::create([
            'content' => $data['message'],
            'ticket_id' => $ticket->id,
        ]);

        return redirect()->route('customer.tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customer = Auth::guard('frontend')->user();
        $ticket = Ticket::with('attachments', 'category', 'status')->findOrFail($id);

        if ($customer->can('view', $ticket)) {
            $canOpen = $customer->can('open', $ticket);
            $canClose = $customer->can('close', $ticket);
            $comments = $ticket->messages()->with('employee')->get();

            return view('customer.ticket_show', compact('customer','ticket', 'comments', 'canOpen', 'canClose'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Auth::guard('frontend')->user();
        $ticket = Ticket::findOrFail($id);

        $data = $request->all();

        if ($customer->can('update', $ticket)) {

            Validator::make($data, [
                'message' => 'required|string|min:6',
            ])->validate();

            TicketMessage::create([
                'content' => $data['message'],
                'ticket_id' => $ticket->id,
            ]);

            return redirect()->route('customer.tickets.show', ['id' => $ticket->id]);
        } else {
            abort(404);
        }
    }

    /**
     * Close the specified ticket
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function close($id)
    {
        $customer = Auth::guard('frontend')->user();
        $ticket = Ticket::userTickets($customer->id)->findOrFail($id);

        if ($customer->can('close', $ticket)) {
            $ticket->complete();
            return redirect()->route('customer.tickets');
        } else {
            abort(404);
        }
    }

    /**
     * Re Open the specified ticket
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function open($id)
    {
        $customer = Auth::guard('frontend')->user();
        $ticket = Ticket::userTickets($customer->id)->findOrFail($id);

        if ($customer->can('reopen', $ticket)) {
            // TODO - Reopen Ticket
            return redirect()->route('customer.tickets.show', compact('id'));
        } else {
            abort(404);
        }
    }

    /**
     * Get a validator for an incoming store request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'priority' => 'required|digits:1',
            'category' => 'required|string|exists:ticket_categories,slug',
            'subject' => 'required|string|min:3|max:255',
            'message' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:frontend');
    }
}
