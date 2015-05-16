# London Student site

## Tech
- Wordpress
- Gulp for task management

### Dev setup
- Gulp
- Sass
- Vagrant

**Setup**

Clone the repo, then run:
```
$ vagrant up
```

**Git Hooks**
We're using git hooks to sync the database. You'll need the mysql and mysqldump commands set up first (this will depend on your dev environment). You'll then need `LSDROPBOX` and `LSDB` environment variables set up, pointing to the LondonStudent dropbox folder on your machine and the name you're using for the database respectively.
When they're set up run:
```
$ cp hooks/* .git/hooks/
$ chmod +x .git/hooks/post-merge .git/hooks/pre-commit
```

