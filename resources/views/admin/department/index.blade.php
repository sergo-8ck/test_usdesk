@extends('admin.layout')

@section('content')
<div class="card-header">
    Section
    <a class="btn btn-primary float-right" href="#" role="button">Add</a>
</div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <table class="table">
        <tbody>
        <tr>
            <td>
                <img src="/storage/logo/krasot.jpg" class="img-thumbnail" alt="Responsive image" width="150">
            </td>
            <td>
                <strong>Department 1</strong>
                <div>oeuaoeuaoeuaoe uoe uaoeu aoeu aoeu aoe uaoeu </div>
            </td>
            <td>
                <strong>Users</strong>
                <ul>
                    <li>User 1</li>
                    <li>User 2</li>
                    <li>User 3</li>
                </ul>
            </td>
            <td>
                <a class="btn btn-secondary btn-sm" href="#" role="button">Edit</a>
                <button type="button" class="btn btn-danger btn-sm">Danger</button>
            </td>
        </tr>
        <tr>
            <td><img src="/storage/logo/krasot.jpg" class="img-thumbnail" alt="Responsive image" width="150"></td>
            <td>
                <strong>Department 2</strong>
                <div>oeuaoeuaoeuaoe uoe uaoeu aoeu aoeu aoe uaoeu </div></td>
            <td>
                <strong>Users</strong>
                <ul>
                    <li>User 1</li>
                    <li>User 2</li>
                    <li>User 3</li>
                </ul>
            </td>
            <td>
                <a class="btn btn-secondary btn-sm" href="#" role="button">Edit</a>
                <button type="button" class="btn btn-danger btn-sm">Danger</button>
            </td>
        </tr>
        <tr>
            <td><img src="/storage/logo/krasot.jpg" class="img-thumbnail" alt="Responsive image" width="150"></td>
            <td>
                <strong>Department 3</strong>
                <div>oeuaoeuaoeuaoe uoe uaoeu aoeu aoeu aoe uaoeu </div>
            </td>
            <td>
                <strong>Users</strong>
                <ul>
                    <li>User 1</li>
                    <li>User 2</li>
                    <li>User 3</li>
                </ul>
            </td>
            <td>
                <a class="btn btn-secondary btn-sm" href="#" role="button">Edit</a>
                <button type="button" class="btn btn-danger btn-sm">Danger</button>
            </td>
        </tr>
        </tbody>
    </table>

    {{--pagination--}}
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
    {{--pagination end--}}
</div>

@endsection
