@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.administrator_office') }}
                        </th>
                        <td>
                            {{ $user->administrator_office }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.balance') }}
                        </th>
                        {{-- <td>
                            {{ $user->balance }}
                        </td> --}}
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    {{-- <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#agent_transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.transaction.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#customer_transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.transaction.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#agent_balance_histories" role="tab" data-toggle="tab">
                {{ trans('cruds.balanceHistory.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#added_by_balance_histories" role="tab" data-toggle="tab">
                {{ trans('cruds.balanceHistory.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="agent_transactions">
            @includeIf('admin.users.relationships.agentTransactions', ['transactions' => $user->agentTransactions])
        </div>
        <div class="tab-pane" role="tabpanel" id="customer_transactions">
            @includeIf('admin.users.relationships.customerTransactions', ['transactions' => $user->customerTransactions])
        </div>
        <div class="tab-pane" role="tabpanel" id="agent_balance_histories">
            @includeIf('admin.users.relationships.agentBalanceHistories', ['balanceHistories' => $user->agentBalanceHistories])
        </div>
        <div class="tab-pane" role="tabpanel" id="added_by_balance_histories">
            @includeIf('admin.users.relationships.addedByBalanceHistories', ['balanceHistories' => $user->addedByBalanceHistories])
        </div>
    </div> --}}
</div>

@endsection