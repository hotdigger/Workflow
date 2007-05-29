<?php
/**
 * File containing the ezcWorkflowExecutionNonInteractive class.
 *
 * @package Workflow
 * @version //autogen//
 * @copyright Copyright (C) 2005-2007 eZ systems as. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 */

/**
 * Workflow execution engine for non-interactive workflows.
 *
 * @package Workflow
 * @version //autogen//
 */
class ezcWorkflowExecutionNonInteractive extends ezcWorkflowExecution
{
    /**
     * Property write access.
     * 
     * @param string $propertyName Name of the property.
     * @param mixed $val  The value for the property.
     *
     * @throws ezcBaseValueException 
     *         If a the value for the property definitionHandler is not an
     *         instance of ezcWorkflowDefinition.
     * @throws ezcBaseValueException 
     *         If a the value for the property workflow is not an instance of
     *         ezcWorkflow.
     * @ignore
     */
    public function __set( $propertyName, $val )
    {
        if ( $propertyName == 'workflow' )
        {
            if ( !( $val instanceof ezcWorkflow ) )
            {
                throw new ezcBaseValueException( $propertyName, $val, 'ezcWorkflow' );
            }

            if ( $val->isInteractive() || $val->hasSubWorkflows() )
            {
                throw new ezcWorkflowExecutionException(
                  'This executer can only execute workflow that have no Input and SubWorkflow nodes.'
                );
            }

            $this->properties['workflow'] = $val;

            return;
        }
        else
        {
            return parent::__set( $propertyName, $val );
        }
    }

    /**
     * Start workflow execution.
     *
     * @param  integer $parentId
     */
    protected function doStart( $parentId )
    {
    }

    /**
     * Suspend workflow execution.
     */
    protected function doSuspend()
    {
    }

    /**
     * Resume workflow execution.
     *
     * @param integer $executionId  ID of the execution to resume.
     */
    protected function doResume( $executionId )
    {
    }

    /**
     * End workflow execution.
     */
    protected function doEnd()
    {
    }

    /**
     * Returns a new execution object for a sub workflow.
     *
     * @return ezcWorkflowExecution
     */
    protected function doGetSubExecution()
    {
    }
}
?>
