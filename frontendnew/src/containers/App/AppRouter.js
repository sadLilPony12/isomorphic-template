import React from 'react';
import { Switch, Route } from 'react-router-dom';
import asyncComponent from '../../helpers/AsyncFunc';
//disdf
class AppRouter extends React.Component {
  render() {
    const { url } = this.props;
    return (
      <Switch>
        {/* Forbiden  */}
        <Route exact path={`${url}/pinagbabawal/roles`}
          component={asyncComponent(() => import('../../views/actors/roles'))} />
        <Route exact path={`${url}/pinagbabawal/schools`}
          component={asyncComponent(() => import('../../views/actors/schools'))} />
        <Route exact path={`${url}/pinagbabawal/users`}
          component={asyncComponent(() => import('../../views/actors/superadmin'))} />
        {/* End of Forbiden */}
      </Switch >
    );
  }
}

export default AppRouter;
