@extends('dashboard.base')
@section('content')
<div class="container mt-6">
    <div class="card m-3">
        <header class="card-header">
          <p class="card-header-title is-flex is-justify-content-space-between">
            Games <button class=" button is-primary is-pulled-right">Insert</button>
          </p>
        </header>
        <div class="card-content">
            <table class="table is-fullwidth">
                <thead>
                  <tr>
                    <th>Game</th>
                    <th>Release</th>
                    <th>Video</th>
                    <th>Price</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Game</th>
                    <th>Release</th>
                    <th>Video</th>
                    <th>Price</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td><img class="image width-48 is-pulled-left mr-4" src="https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/6ae6f5e0e2e090ad91d393562f206c0b.png"> The Witcher</td>
                    <td>05/12/2009</td>
                    <td>Video</td>
                    <td>Price</td>
                    <td class="has-text-right"><button class="button is-info is-small">Edit</button> <button class="button is-danger is-small">Delete</button></td>
                  </tr>

                  <tr>
                    <td><img class="image width-48 is-pulled-left mr-4" src="https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/6ae6f5e0e2e090ad91d393562f206c0b.png"> The Witcher</td>
                    <td>05/12/2009</td>
                    <td>Video</td>
                    <td>Price</td>
                    <td class="has-text-right"><button class="button is-info is-small">Edit</button> <button class="button is-danger is-small">Delete</button></td>
                  </tr>
                </tbody>
              </table>
        </div>
        <footer class="card-footer">
            <nav class="card-footer-item pagination is-small" role="navigation" aria-label="pagination">
                <a class="pagination-previous" title="This is the first page" disabled>Previous</a>
                <a class="pagination-next">Next page</a>
                <ul class="pagination-list">
                  <li>
                    <a class="pagination-link is-current" aria-label="Page 1" aria-current="page">1</a>
                  </li>
                  <li>
                    <a class="pagination-link" aria-label="Goto page 2">2</a>
                  </li>
                  <li>
                    <a class="pagination-link" aria-label="Goto page 3">3</a>
                  </li>
                </ul>
              </nav>
        </footer>
      </div>
</div>
@endsection