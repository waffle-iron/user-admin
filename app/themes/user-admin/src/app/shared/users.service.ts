import { Injectable }                                                   from '@angular/core';
import { Http, Response, Headers, RequestOptions, URLSearchParams }     from '@angular/http';
import { BehaviorSubject }                                              from "rxjs";

import 'rxjs';

import { AuthService }  from "./auth.service";
import { User }         from "./models/user.model";

@Injectable()
export class UsersService {

    private _users$: BehaviorSubject<any>;
    private _total$: BehaviorSubject<any>;
    private dataStore: {users?: any, total?: number};

    private listUrl     = "/ajax/erdiko/users/admin/list";
    private userUrl     = "/ajax/erdiko/users/admin/retrieve";
    private updateUrl   = "/ajax/erdiko/users/admin/update";
    private createUrl   = "/ajax/erdiko/users/admin/create";
    private deleteUrl   = "/ajax/erdiko/users/admin/delete";

    private authToken: any;

    private _baseUrl: string;

    constructor(
        private http: Http,
        private authService: AuthService) {

        this.dataStore = {};
        this._users$ = new BehaviorSubject(null);
        this._total$ = new BehaviorSubject(null);

        // hack to help with local development
        this._baseUrl = "";
        if(window.location && "localhost" == window.location.hostname) {
            this._baseUrl = "http://docker.local:8088";
        }

    }

    get users$() {
        return this._users$.asObservable();
    }

    get total$() {
        return this._total$.asObservable();
    }

    /**
     *
     *
     */
    private _getHeaderOptions() {
        // add authorization header with jwt token
        let headers = new Headers({ 
                                    'Content-Type': 'application/json',
                                    'Authorization': 'Bearer ' + this.authService.token
                                });
        let options = new RequestOptions({ headers: headers });

        return options;
    }

    /**
     * Get list of users based on sort, returns an observable
     *
     */
    getUsers(pagesize?: number, page?: number, sortCol?: string, sortDir?: string) {
        let url = this._baseUrl + this.listUrl;

        if(pagesize) {
            url += "?pagesize=" + pagesize;
        }

        if(page) {
            url += "&page=" + page;
        }

        if(sortCol) {
            url += "&sort=" + sortCol;
        }

        if(sortDir) {
            url += "&direction=" + sortDir;
        }
    
        let options = this._getHeaderOptions();

        return this.http.get(url, options)
                   .map(response => response.json())
                   .subscribe(data => {
                       this.dataStore.users = [];
                       this.dataStore.total = 0;
                       if(true == data.body.success) {
                           this.dataStore.users = data.body.users.users;
                           this.dataStore.total = data.body.users.total;
                       }
                       this._users$.next(this.dataStore.users);
                       this._total$.next(this.dataStore.total);
                   },
                   error => {
                       // log the error!
                       console.error("Error retrieving users!", url, error);
                       
                       this._users$.next([]);
                       this._total$.next(0);
                   });
    }

    /**
     * Get a specific user, returns a promise
     *
     */
    getUser(id: string) {
        let url = this._baseUrl + this.userUrl + '?id=' + id;
        let options = this._getHeaderOptions();
        return this.http.get(url, options)
                   .toPromise()
                   .then(response => response.json().body.user as User)
                   .catch(this.handleError);
    }

    /**
     * Update a specific user
     *
     */
    updateUser(user) {
        let body = JSON.stringify(user);

        let options = this._getHeaderOptions();

        let url = this._baseUrl + this.updateUrl;
        return this.http.post(url, body, options)
                   .toPromise()
                   .then(response => response.json().body)
                   .catch(this.handleError);
    }

    /**
     * Create a new user
     *
     */
    createUser(user) {
        let body = JSON.stringify(user);
        let options = this._getHeaderOptions();

        let url = this._baseUrl + this.createUrl;
        return this.http.post(url, body, options)
                   .toPromise()
                   .then(response => response.json().body)
                   .catch(this.handleError);
    }

    /**
     *
     *
     */
    deleteUser(id: string) {
        let body = JSON.stringify({"id": id});
        let options = this._getHeaderOptions();

        let url = this._baseUrl + this.deleteUrl;
        return this.http.post(url, body, options)
                   .toPromise()
                   .then(response => response.json().body)
                   .catch(this.handleError);

    }

    /**
     * handle response errors
     *
     */
    private handleError(error: any) {
        return Promise.reject(error.message || error);
    }

}
