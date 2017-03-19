# On the 16/01/2017

## Still to be corrected :
* Add a __Comment__ Entity
  * Verify it working by clearing the cache in production environment
    * (Console Command)
* Add the Comments' list in the view

* Let the scripts/gitarchive.sh generate the bundle.js and the css before packaging !!!

# On the 17/01/2017

## Done:

* script for clearing the symfony's caches
* simplication of the randonnees's page
* gitarchive.sh rebuilds bundle.js

## To be added in a near future

* ~~Adding the React Comment component~~
  * ~~inserting that component into the RJ react's view~~
* A Bootstrap search engine on the left side or on the top
* The authentication with the same algorithm as Cake (same username same password)
  * A different view for not connected people (just departure stations, no time schedules)

* change the react shell scripts for grunt actions !!!

# On the 30/01/2017

## Done

* see ~~strike through items~~ up !
* added icons for _Randonnées Surprises_ and when comments presents
  * il no comment, the Day Hike's react view doesn't present the comment part of the bootstrap accordion !

## To be added to the TODO List

* make rifrando.css to be generated through _Grunt/Booststrap dist_
* make index / table to let appear only certain columns when display mode reduced to tablet / smartphone (see Martin's tyouts)

## in progress:

* proposing a filter function based on [this Bootsnip example](http://bootsnipp.com/snippets/featured/bootstrap-mega-menu)
  * __TODO:__ It added new styles that are to be merged with the default ones ...

## in progress on the 11/02/2017:

* starting migrating to Bootstrap 4 (following my new Packt eBook)
  * [Glyphsearch](http://glyphsearch.com/) is the new tool for finding the right __awesome icon__
* replacing done of _react-bootstrap_ for [reactstrap](https://reactstrap.github.io/)
  * TODO: use the project creator next time (networks problem today!)

``` bash
jpmena@jpmena-P34 ~/RIF/adherentss3/web/rif (master) $ create-react-app my-app
.....................................;
│ │ └── is-extglob@2.1.1
  │ └─┬ micromatch@2.3.11
  │   ├─┬ arr-diff@2.0.0
npm WARN optional Skipping failed optional dependency /react-scripts/fsevents:
npm WARN notsup Not compatible with your operating system or architecture: fsevents@1.0.17
npm WARN optional Skipping failed optional dependency /chokidar/fsevents:
npm WARN notsup Not compatible with your operating system or architecture: fsevents@1.0.17

  │   ├── array-unique@0.2.1
  │   ├─┬ braces@1.8.5
  │   │ ├─┬ expand-range@1.8.2

.....................................................

  ├── webpack-manifest-plugin@1.1.0
   └── whatwg-fetch@2.0.2

 Installing react and react-dom using npm...

 rj_comps@0.1.0 /home/jpmena/RIF/adherentss3/web/rif/rj_comps
 ├─┬ react@15.4.2
 │ └─┬ fbjs@0.8.9
 │   ├── core-js@1.2.7
 │   ├─┬ isomorphic-fetch@2.2.1
 │   │ └─┬ node-fetch@1.6.3
 │   │   ├── encoding@0.1.12
 │   │   └── is-stream@1.1.0
 │   └── ua-parser-js@0.7.12
 └── react-dom@15.4.2

 npm WARN optional Skipping failed optional dependency /chokidar/fsevents:
 npm WARN notsup Not compatible with your operating system or architecture: fsevents@1.0.17
 npm WARN optional Skipping failed optional dependency /react-scripts/fsevents:
 npm WARN notsup Not compatible with your operating system or architecture: fsevents@1.0.17
  Success! Created rj_comps at /home/jpmena/RIF/adherentss3/web/rif/rj_comps
  Inside that directory, you can run several commands:

    npm start
      Starts the development server.

    npm run build
      Bundles the app into static files for production.

    npm test
      Starts the test runner.

    npm run eject
      Removes this tool and copies build dependencies, configuration files
      and scripts into the app directory. If you do this, you can’t go back!

  We suggest that you begin by typing:

    cd rj_comps
    npm start

  Happy hacking!


# for the time being, I Put this creation aside !!!
jpmena@jpmena-P34 ~/RIF/adherentss3/web/rif (master) $ mv rj_comps ~/RIF/
```

# TODO at the 13/02/2017

## navbar difficultuties

* navbar-fixed and and table by default overlap !
* new colour of navbar

## table responsivity ...
* reduce the number of column shown depending on the breakpoint !!!

## navbar not responsive
* TODO back to the burger when the size iss too small

## other main TODO:
* Follwing the [modal reactstrap example](https://reactstrap.github.io/components/modals/), find out why my DetailRJ Window is not appearing ????
  * les exemples Réact sont sous [GitHub Exemples](https://github.com/reactstrap/reactstrap/tree/master/docs/lib/examples)
  * à tester avec le projet par défaut que j'ai sous __~/RIF/rj_comps__ ???
* filter add (Bootstrap Form )...
* differentiation of datas to be shhown depending on the cconnected / state !

# New State on the 15/02/2017

## Reactstrap working !!!

* Reactstrap working with the actual building scripts (no need at that time to call for the reactstrp buit tool !)
  * perhaphs it was not working becase Symfony cache to be emptied !!!
  * It did work after I reconstructed the project direcctly from Bitbucket

## Customising colors and fonts :

* the tag-pill are not taken into account
* For the modal window, the default Bootstrap colours have to be changed !!!