% Using Solidity grammar
% TXL Parser
include "solidityGrammar.Grm"

define DOSStatement
	[NL] 'DOS 'CONDITION 'WARNING '==> [expression] 
end define 

redefine statement
	...
	| [DOSStatement]
end redefine 
redefine functionDefinition
	...
	| [empty]
	|'VULNERABILITY-IN 'function [opt identifier] [parameterList] [modifierList] [opt returnParameters] ';
end redefine


redefine contractDefinition
...
| 'PARSED 'contract [identifier] [opt isInheritance] '{ [repeat contractPart] '}
end redefine


function main
    replace [program]
		P [program]	
		construct contractDefs [repeat contractDefinition]
			_[^ P] [checkForDOS]
	by 
		P  	
end function

rule checkForDOS
	replace [contractDefinition]
		contractDef [contractDefinition]
		deconstruct not contractDef
		'PARSED 'contract contractName[identifier] _[opt isInheritance] '{ cp [repeat contractPart] '}
		deconstruct contractDef
			'contract contractName[identifier] _[opt isInheritance] '{ cp [repeat contractPart] '}
		construct filename[stringlit]
			_[+"FinalResult.txt"]
		construct contractReplacement [contractDefinition]
			contractDef [checkAssert]
					[checkIfStatement]
					[checkRequire]
		construct functionDef [repeat functionDefinition]
		_[^ contractReplacement] [checkNoFuncBody][checkDOSStatement] [checkNoDOSStatement]
		construct output [stringlit]
		_[+"Scanned Contract: "][quote contractName] [+"  "] [+"  "][quote functionDef]
		[fput filename]
		
	by 
		'PARSED 'contract contractName'{ cp'}
end rule


rule checkIfStatement
	replace [statement]
		S[statement]
		deconstruct S
		'if '( exp[expression] ')  ifBlock[statement] _[opt elseStatement]
		deconstruct exp
			functionCall[expression] '( _[functionCallArguments] ') 
		deconstruct functionCall
			_[expression] '. id[identifier]
		construct externalCallTypes [repeat identifier]
		'send  'transfer 'call
		deconstruct * [identifier] externalCallTypes
		id	
		deconstruct ifBlock 
		'{ blockStatement [repeat statement] '}
		deconstruct * [statement] blockStatement
		throw [throwStatement] 			
	by 
	'DOS 'CONDITION 'WARNING '==> exp
	%'if '( exp ') ifBlock
end rule	

rule checkRequire
	replace [statement]
			S [statement]
			deconstruct S
			'require '( FCA [functionCallArguments] ') ';
		deconstruct FCA 
			le[list expression]
		deconstruct * [expression] le 
			functionCall[expression] '( _[functionCallArguments] ') 
		deconstruct functionCall
			_[expression] '. id[identifier]
		construct externalCallTypes [repeat identifier]
		'send  'transfer 'call
		deconstruct * [identifier] externalCallTypes
		id
		 		
	by 
	'DOS 'CONDITION 'WARNING '==> functionCall
	%'require '( FCA ') ';
end rule
 
rule checkAssert
	replace [statement]
		S[statement]
		deconstruct S
			'assert '( FCA [functionCallArguments] ') ';
		deconstruct FCA 
			le[list expression]
		deconstruct * [expression] le 
			functionCall[expression] '( _[functionCallArguments] ') 
		deconstruct functionCall
			_[expression] '. id[identifier]
		construct externalCallTypes [repeat identifier]
			'send  'transfer 'call
		deconstruct * [identifier] externalCallTypes
			id
	by 
	'DOS 'CONDITION 'WARNING '==> functionCall
	%'assert '( FCA ') ';
end rule

rule checkNoFuncBody 
	replace [functionDefinition] 
		funcDef [functionDefinition]
		deconstruct funcDef
		 'function id [opt identifier] pl [parameterList] ml [modifierList] rp [opt returnParameters] ';
	by 
	
end rule 

rule checkDOSStatement
	 replace [functionDefinition] 
		funcDef [functionDefinition]
		deconstruct not funcDef
		 'VULNERABILITY-IN 'function id [opt identifier] pl [parameterList] ml [modifierList] rp [opt returnParameters] ';
		deconstruct funcDef
			'function id [opt identifier] pl [parameterList] ml [modifierList] rp [opt returnParameters] '{ blockStatement [repeat statement] '}
		deconstruct * [statement] blockStatement
			dos [DOSStatement]	
	by
	'VULNERABILITY-IN 'function id pl ml rp ';
end rule

rule checkNoDOSStatement
	 replace [functionDefinition] 
			funcDef [functionDefinition]
		deconstruct not funcDef
		 'VULNERABILITY-IN 'function id [opt identifier] pl [parameterList] ml [modifierList] rp [opt returnParameters] ';
		deconstruct funcDef
			'function id [opt identifier] pl [parameterList] ml [modifierList] rp [opt returnParameters] '{ blockStatement [repeat statement] '}
		deconstruct not * [statement] blockStatement
			dos [DOSStatement] 	
	by
	
end rule	
